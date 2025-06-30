<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('currencies')->delete();
        
        \DB::table('currencies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'US Dollar',
                'slug' => 'us-dollar',
                'code' => 'USD',
                'symbol' => '$',
                'position' => 'Left',
                'conversion_rate' => 1.0,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Euro',
                'slug' => 'euro',
                'code' => 'EUR',
                'symbol' => '€',
                'position' => 'Left',
                'conversion_rate' => 0.92,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'British Pound',
                'slug' => 'british-pound',
                'code' => 'GBP',
                'symbol' => '£',
                'position' => 'Left',
                'conversion_rate' => 0.78,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Japanese Yen',
                'slug' => 'japanese-yen',
                'code' => 'JPY',
                'symbol' => '¥',
                'position' => 'Left',
                'conversion_rate' => 140.25,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Swiss Franc',
                'slug' => 'swiss-franc',
                'code' => 'CHF',
                'symbol' => 'Fr',
                'position' => 'Left',
                'conversion_rate' => 0.91,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Canadian Dollar',
                'slug' => 'canadian-dollar',
                'code' => 'CAD',
                'symbol' => 'C$',
                'position' => 'Left',
                'conversion_rate' => 1.36,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Australian Dollar',
                'slug' => 'australian-dollar',
                'code' => 'AUD',
                'symbol' => 'A$',
                'position' => 'Left',
                'conversion_rate' => 1.51,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Chinese Yuan',
                'slug' => 'chinese-yuan',
                'code' => 'CNY',
                'symbol' => '¥',
                'position' => 'Left',
                'conversion_rate' => 7.1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Bangladeshi Taka',
                'slug' => 'bangladeshi-taka',
                'code' => 'BDT',
                'symbol' => '৳',
                'position' => 'Left',
                'conversion_rate' => 109.5,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Singapore Dollar',
                'slug' => 'singapore-dollar',
                'code' => 'SGD',
                'symbol' => 'S$',
                'position' => 'Left',
                'conversion_rate' => 1.35,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
        ));

        
    }
}