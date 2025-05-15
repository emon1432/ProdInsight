<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ScanJsonTranslations extends Command
{
    protected $signature = 'translations:scan-json';
    protected $description = 'Scan Blade/PHP files and auto-fill en.json with missing __() translation keys.';

    public function handle()
    {
        $path = base_path(); // search entire project
        $jsonPath = resource_path('lang/en.json');
        $translations = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];

        $pattern = '/__\(\s*[\'"](.+?)[\'"]\s*\)/';
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

        foreach ($files as $file) {
            if (!$file->isFile()) continue;

            $ext = $file->getExtension();
            if (!in_array($ext, ['php', 'blade.php'])) continue;

            $content = file_get_contents($file->getRealPath());

            if (preg_match_all($pattern, $content, $matches)) {
                foreach ($matches[1] as $key) {
                    if (!isset($translations[$key])) {
                        $translations[$key] = $key; // Default: English = key
                        $this->line("✔ Found new key: $key");
                    }
                }
            }
        }

        ksort($translations);
        file_put_contents($jsonPath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $this->info("✅ Updated lang/en.json with new keys.");
    }
}
