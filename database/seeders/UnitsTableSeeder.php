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
                'name' => 'Kilogram',
                'slug' => 'kilogram',
                'symbol' => 'kg',
                'status' => 'Active',
                'description' => 'Unit of mass equal to 1000 grams',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Gram',
                'slug' => 'gram',
                'symbol' => 'g',
                'status' => 'Active',
                'description' => 'Basic unit of mass in metric system',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Liter',
                'slug' => 'liter',
                'symbol' => 'L',
                'status' => 'Active',
                'description' => 'Unit of volume measurement',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Milliliter',
                'slug' => 'milliliter',
                'symbol' => 'mL',
                'status' => 'Active',
                'description' => 'Unit of volume equal to 1/1000 liter',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Piece',
                'slug' => 'piece',
                'symbol' => 'pc',
                'status' => 'Active',
                'description' => 'Individual item or unit count',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Meter',
                'slug' => 'meter',
                'symbol' => 'm',
                'status' => 'Active',
                'description' => 'Basic unit of length measurement',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Centimeter',
                'slug' => 'centimeter',
                'symbol' => 'cm',
                'status' => 'Active',
                'description' => 'Unit of length equal to 1/100 meter',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Square Meter',
                'slug' => 'square-meter',
                'symbol' => 'm²',
                'status' => 'Active',
                'description' => 'Unit of area measurement',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ton',
                'slug' => 'ton',
                'symbol' => 't',
                'status' => 'Active',
                'description' => 'Unit of mass equal to 1000 kilograms',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Pound',
                'slug' => 'pound',
                'symbol' => 'lb',
                'status' => 'Active',
                'description' => 'Imperial unit of mass approximately 0.454 kg',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
        ));
        
        
    }
}