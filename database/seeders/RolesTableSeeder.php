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
                'role_group_id' => 1,
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
                'role_group_id' => 1,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"currencies":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"non-inventory-items":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"production-stages":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"raw-material-categories":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"raw-materials":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"roles-permissions":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"settings":{"index":true,"edit":true},"units":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"users":{"index":true,"create":true,"show":true,"edit":true,"destroy":true}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-07-17 17:14:18',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Manager',
                'slug' => 'manager',
                'role_group_id' => 1,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"currencies":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"non-inventory-items":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"production-stages":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"raw-material-categories":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"raw-materials":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"roles-permissions":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"settings":{"index":true,"edit":true},"units":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"users":{"index":true,"create":true,"show":true,"edit":true,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Production Supervisor',
                'slug' => 'production-supervisor',
                'role_group_id' => 2,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"production-stages":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"raw-material-categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-materials":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Inventory Manager',
                'slug' => 'inventory-manager',
                'role_group_id' => 3,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"production-stages":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-material-categories":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"raw-materials":{"index":true,"create":true,"show":true,"edit":true,"destroy":true},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Quality Controller',
                'slug' => 'quality-controller',
                'role_group_id' => 2,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"production-stages":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"raw-material-categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-materials":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Purchasing Officer',
                'slug' => 'purchasing-officer',
                'role_group_id' => 6,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"production-stages":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-material-categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-materials":{"index":true,"create":true,"show":true,"edit":true,"destroy":false},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Warehouse Keeper',
                'slug' => 'warehouse-keeper',
                'role_group_id' => 3,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"production-stages":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-material-categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-materials":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Analyst',
                'slug' => 'analyst',
                'role_group_id' => 1,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"production-stages":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-material-categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-materials":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Operator',
                'slug' => 'operator',
                'role_group_id' => 2,
                'status' => 'Active',
                'permission' => '{"categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"currencies":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"non-inventory-items":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"production-stages":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"raw-material-categories":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"raw-materials":{"index":true,"create":false,"show":true,"edit":true,"destroy":false},"roles-permissions":{"index":false,"create":false,"show":false,"edit":false,"destroy":false},"settings":{"index":false,"edit":false},"units":{"index":true,"create":false,"show":true,"edit":false,"destroy":false},"users":{"index":false,"create":false,"show":false,"edit":false,"destroy":false}}',
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
        ));


    }
}
