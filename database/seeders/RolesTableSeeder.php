<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'slug' => 'admin',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Manager',
                'slug' => 'manager',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Production Supervisor',
                'slug' => 'production-supervisor',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Inventory Manager',
                'slug' => 'inventory-manager',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Quality Controller',
                'slug' => 'quality-controller',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Purchasing Officer',
                'slug' => 'purchasing-officer',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Warehouse Keeper',
                'slug' => 'warehouse-keeper',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Analyst',
                'slug' => 'analyst',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Operator',
                'slug' => 'operator',
                'status' => 'Active',
                'permission' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
        ));

        
    }
}