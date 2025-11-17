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

        $table = Str::snake(Str::pluralStudly(class_basename($modelClass)));

        $db = env('DB_DATABASE');

        $relation = DB::table('information_schema.KEY_COLUMN_USAGE')
            ->where('TABLE_SCHEMA', $db)
            ->where('TABLE_NAME', $table)
            ->where('COLUMN_NAME', $foreignKey)
            ->whereNotNull('REFERENCED_TABLE_NAME')
            ->first();

        return $relation?->REFERENCED_TABLE_NAME ?? null;
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

            // Try model-class mapping fallback
            $relation = Str::studly(Str::beforeLast($key, '_id'));
            $relatedModelClass = "App\\Models\\{$relation}";

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
         * 4) Date detection (safe, no phone confusion)
         * --------------------------------------------- */
        $looksLikeDate = preg_match('/(\d{4}-\d{2}-\d{2}|T\d|:\d{2})/', $value);

        if ($looksLikeDate) {
            try {
                $carbon = Carbon::parse($value);

                // Only treat real years as valid
                if ($carbon->year >= 1900 && $carbon->year <= 2100) {
                    return $carbon->format('d M Y, h:i A');
                }
            } catch (\Throwable $e) {
                return e($value);
            }
        }

        /* ---------------------------------------------
         * 5) Status detection
         * --------------------------------------------- */
        if ($key == 'status') {
            return (new StatusBadge($value))->render();
        }

        /* ---------------------------------------------
         * 6) Default → safe escaped value
         * --------------------------------------------- */
        return e($value);
    }
}
