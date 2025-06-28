<?php

use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

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

if (!function_exists('number_format_without_currency')) {
    function number_format_without_currency($number)
    {
        $decimalSeparator = settings('system_settings', 'decimal_separator', '.');
        $thousandSeparator = settings('system_settings', 'thousand_separator', '.');
        $decimalPrecision = settings('system_settings', 'decimal_precision', 2);
        return number_format($number, $decimalPrecision, $decimalSeparator, $thousandSeparator);
    }
}

if (!function_exists('amount_format')) {
    function amount_format($amount)
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

        $parentValue = number_format_without_currency(floor($value / $conversionRate));
        $childValue = number_format_without_currency($value % $conversionRate);

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
