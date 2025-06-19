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
                'name' => 'United States Dollar',
                'slug' => 'united-states-dollar',
                'code' => 'USD',
                'symbol' => '$',
                'position' => 'Left',
                'conversion_rate' => 1.0,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 10:38:38',
                'updated_at' => '2025-06-19 10:38:38',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Bangladeshi Taka',
                'slug' => 'bangladeshi-taka',
                'code' => 'BDT',
                'symbol' => '৳',
                'position' => 'Left',
                'conversion_rate' => 122.22,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 10:38:38',
                'updated_at' => '2025-06-19 10:38:38',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Euro',
                'slug' => 'euro',
                'code' => 'EUR',
                'symbol' => '€',
                'position' => 'Left',
                'conversion_rate' => 0.87,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 10:38:38',
                'updated_at' => '2025-06-19 10:38:38',
            ),
        ));


    }
}
