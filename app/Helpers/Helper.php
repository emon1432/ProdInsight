<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function setting()
{
    if (Schema::hasTable('settings') && DB::table('settings')->exists()) {
        return DB::table('settings')->first();
    }

    return (object) [
        'favicon' => null,
        'title' => 'Laravel',
        'logo' => null,
        'name' => 'Laravel',
    ];
}
