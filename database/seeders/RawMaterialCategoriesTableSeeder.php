<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RawMaterialCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('raw_material_categories')->delete();
        
        \DB::table('raw_material_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Raw Material Category 1',
                'slug' => 'raw-material-category-1',
                'status' => 'Active',
                'description' => 'Description for Raw Material Category 1',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-01 06:24:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Raw Material Category 2',
                'slug' => 'raw-material-category-2',
                'status' => 'Active',
                'description' => 'Description for Raw Material Category 2',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-01 06:24:37',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Raw Material Category 3',
                'slug' => 'raw-material-category-3',
                'status' => 'Active',
                'description' => 'Description for Raw Material Category 3',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-01 06:24:37',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Raw Material Category 4',
                'slug' => 'raw-material-category-4',
                'status' => 'Active',
                'description' => 'Description for Raw Material Category 4',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-01 06:24:37',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Raw Material Category 5',
                'slug' => 'raw-material-category-5',
                'status' => 'Active',
                'description' => 'Description for Raw Material Category 5',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-01 06:24:37',
            ),
        ));
        
        
    }
}