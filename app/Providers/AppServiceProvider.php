<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $systemSettingsJson = DB::table('settings')->where('key', 'system_settings')->value('value');
        $systemSettings = $systemSettingsJson ? json_decode($systemSettingsJson, true) : [];

        config([
            'app.name' => $systemSettings['app_name'] ?? config('app.name'),
            'app.url' => $systemSettings['app_url'] ?? config('app.url'),
            'app.locale' => $systemSettings['app_locale'] ?? config('app.locale'),
            'app.timezone' => $systemSettings['app_timezone'] ?? config('app.timezone'),
            'app.date_format' => $systemSettings['date_format'] ?? 'Y-m-d',
            'app.maintenance_mode' => $systemSettings['maintenance_mode'] ?? false,
            'app.footer_text' => $systemSettings['footer_text'] ?? '',
            'app.copyright' => $systemSettings['copyright'] ?? '',
        ]);
    }
}
