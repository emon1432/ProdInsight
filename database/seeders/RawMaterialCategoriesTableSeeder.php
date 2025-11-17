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
                'name' => 'Metals & Alloys',
                'slug' => 'metals-alloys',
                'status' => 'Active',
                'description' => 'Raw materials including steel, aluminum, copper, and various metal alloys',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Plastics & Polymers',
                'slug' => 'plastics-polymers',
                'status' => 'Active',
                'description' => 'Various plastic materials, resins, and polymer compounds',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Chemicals & Solvents',
                'slug' => 'chemicals-solvents',
                'status' => 'Active',
                'description' => 'Industrial chemicals, acids, bases, and various solvents',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Textiles & Fabrics',
                'slug' => 'textiles-fabrics',
                'status' => 'Active',
                'description' => 'Cotton, wool, synthetic fibers, and various textile materials',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Wood & Paper',
                'slug' => 'wood-paper',
                'status' => 'Active',
                'description' => 'Lumber, plywood, paper products, and wood-based materials',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Glass & Ceramics',
                'slug' => 'glass-ceramics',
                'status' => 'Active',
                'description' => 'Various types of glass, ceramic materials, and related compounds',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Rubber & Elastomers',
                'slug' => 'rubber-elastomers',
                'status' => 'Active',
                'description' => 'Natural and synthetic rubber, elastic materials',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Electronics Components',
                'slug' => 'electronics-components',
                'status' => 'Active',
                'description' => 'Semiconductors, circuit boards, wires, and electronic components',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Food Ingredients',
                'slug' => 'food-ingredients',
                'status' => 'Active',
                'description' => 'Food processing ingredients, preservatives, and additives',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Construction Materials',
                'slug' => 'construction-materials',
                'status' => 'Active',
                'description' => 'Cement, aggregates, adhesives, and construction-related materials',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
        ));
        
        
    }
}