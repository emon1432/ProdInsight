<?php

use App\Models\Currency;
use App\View\Components\StatusBadge;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (!function_exists('slugify')) {
    function slugify(string $text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $transliterated = iconv('utf-8', 'us-ascii//TRANSLIT//IGNORE', $text);
        if ($transliterated !== false) {
            $text = $transliterated;
        }
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = mb_strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}

if (!function_exists('settings')) {
    function settings(string $key, string $field = null, $default = null)
    {
        $setting = Cache::remember("settings.{$key}", 60, function () use ($key) {
            return DB::table('settings')->where('key', $key)->value('value');
        });

        $decoded = json_decode($setting, true);

        if ($field) {
            return $decoded[$field] ?? $default;
        }

        return $decoded ?? $default;
    }
}

if (!function_exists('format_date')) {
    function format_date($date)
    {
        return \Carbon\Carbon::parse($date)->format(config('app.date_format'));
    }
}

if (!function_exists('format_time')) {
    function format_time($time)
    {
        return \Carbon\Carbon::parse($time)->format(config('app.time_format'));
    }
}

if (!function_exists('format_date_time')) {
    function format_date_time($dateTime)
    {
        return \Carbon\Carbon::parse($dateTime)->format(config('app.date_format') . ', ' . config('app.time_format'));
    }
}

if (!function_exists('format_number')) {
    function format_number($number)
    {
        $decimalSeparator = settings('system_settings', 'decimal_separator', '.');
        $thousandSeparator = settings('system_settings', 'thousand_separator', '.');
        $decimalPrecision = settings('system_settings', 'decimal_precision', 2);
        return number_format($number, $decimalPrecision, $decimalSeparator, $thousandSeparator);
    }
}

if (!function_exists('format_amount')) {
    function format_amount($amount)
    {
        $currency = Currency::find(settings('system_settings', 'currency_id', 1));
        $decimalSeparator = settings('system_settings', 'decimal_separator', '.');
        $thousandSeparator = settings('system_settings', 'thousand_separator', '.');
        $decimalPrecision = settings('system_settings', 'decimal_precision', 2);
        $formattedAmount = number_format($amount, $decimalPrecision, $decimalSeparator, $thousandSeparator);
        if ($currency) {
            if ($currency->position === 'Left') {
                return $currency->symbol . ' ' . $formattedAmount;
            } else {
                return $formattedAmount . ' ' . $currency->symbol;
            }
        }
        return $formattedAmount;
    }
}

if (!function_exists('active_currency')) {
    function active_currency()
    {
        return Currency::find(settings('system_settings', 'currency_id', 1));
    }
}

if (!function_exists('unit_conversion')) {
    function unit_conversion($value, $parentUnit, $childUnit, $conversionRate = 1)
    {
        if ($conversionRate <= 0) {
            return "{$value}{$parentUnit}";
        }

        $parentValue = format_number(floor($value / $conversionRate));
        $childValue = format_number($value % $conversionRate);

        $result = [];
        if ($parentValue > 0) {
            $result[] = sprintf("%.2f%s", $parentValue, $parentUnit);
        }
        if ($childValue > 0 || empty($result)) {
            $result[] = sprintf("%.2f%s", $childValue, $childUnit);
        }

        return implode(' ', $result);
    }
}

if (!function_exists('get_fk_table')) {
    function get_fk_table(string $modelClass, string $foreignKey): ?string
    {
        if (!class_exists($modelClass)) {
            return null;
        }

        $table = (new $modelClass)->getTable();
        $db = env('DB_DATABASE');

        return DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', $db)
            ->where('TABLE_NAME', $table)
            ->where('COLUMN_NAME', $foreignKey)
            ->whereNotNull('REFERENCED_TABLE_NAME')
            ->value('REFERENCED_TABLE_NAME');
    }
}

if (!function_exists('resolve_related_value')) {
    function resolve_related_value(string $key, $value, string $modelClass)
    {
        if ($value === null || $value === '' || $value === '-') {
            return '-';
        }

        $value = trim((string) $value);

        /* ---------------------------------------------
         * 1) Image detection
         * --------------------------------------------- */
        if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $value)) {
            return '<img src="' . imageShow($value) . '" alt="Image"
                        style="max-height: 50px; max-width: 50px;">';
        }

        /* ---------------------------------------------
         * 2) created_by / updated_by / deleted_by
         * --------------------------------------------- */
        if (Str::endsWith($key, '_by')) {
            $user = \App\Models\User::find($value);
            return $user?->name ?? "User ID: {$value}";
        }

        /* ---------------------------------------------
         * 3) *_id → Smart FK resolution
         * --------------------------------------------- */
        if (Str::endsWith($key, '_id')) {
            $fkTable = get_fk_table($modelClass, $key);

            if ($fkTable) {
                $record = DB::table($fkTable)->find($value);
                if ($record) {
                    return $record->name
                        ?? $record->title
                        ?? $record->slug
                        ?? "ID: {$value}";
                }
            }

            // fallback: try model class Auto-detect
            $relatedModelClass = "App\\Models\\" . Str::studly(Str::beforeLast($key, '_id'));

            if (class_exists($relatedModelClass)) {
                $record = $relatedModelClass::find($value);
                if ($record) {
                    return $record->name
                        ?? $record->title
                        ?? $record->slug
                        ?? "ID: {$value}";
                }
            }

            return "ID: {$value}";
        }

        /* ---------------------------------------------
         * 4) JSON detection (clean output)
         * --------------------------------------------- */
        if (Str::startsWith($value, '{') || Str::startsWith($value, '[')) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return '<pre style="white-space: pre-wrap;">' .
                    json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
                    . '</pre>';
            }
        }

        /* ---------------------------------------------
         * 5) Date detection (avoid phone)
         * --------------------------------------------- */
        if (is_string($value) && preg_match('/\d{4}-\d{2}-\d{2}/', $value)) {
            try {
                return format_date_time(Carbon::parse($value)); 
            } catch (\Throwable) {
                // return raw
            }
        }

        /* ---------------------------------------------
         * 6) Status detection
         * --------------------------------------------- */
        if ($key === 'status') {
            return (new StatusBadge($value))->render();
        }

        /* ---------------------------------------------
         * 7) Default: escape safely
         * --------------------------------------------- */
        return e($value);
    }
}
