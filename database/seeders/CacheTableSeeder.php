<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CacheTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cache')->delete();
        
        \DB::table('cache')->insert(array (
            0 => 
            array (
                'key' => 'laravel_cache_7d5acdf8d39b41791db16e0786b19730',
                'value' => 'i:1;',
                'expiration' => 1745389759,
            ),
            1 => 
            array (
                'key' => 'laravel_cache_7d5acdf8d39b41791db16e0786b19730:timer',
                'value' => 'i:1745389759;',
                'expiration' => 1745389759,
            ),
        ));

        
    }
}