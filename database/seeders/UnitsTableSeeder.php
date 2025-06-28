<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'kg',
                'slug' => 'kg',
                'status' => 'Active',
                'description' => 'Kilogram',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-28 06:07:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'gm',
                'slug' => 'gm',
                'status' => 'Active',
                'description' => 'Gram',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-28 06:07:01',
            ),
        ));

        
    }
}