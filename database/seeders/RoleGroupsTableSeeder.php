<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('role_groups')->delete();

        \DB::table('role_groups')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Head Office',
                'slug' => 'head_office',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-10-27 12:00:00',
                'updated_at' => '2025-10-27 12:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Factory',
                'slug' => 'factory',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-10-27 12:00:00',
                'updated_at' => '2025-10-27 12:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Warehouse',
                'slug' => 'warehouse',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-10-27 12:00:00',
                'updated_at' => '2025-10-27 12:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Dealer',
                'slug' => 'dealer',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-10-27 12:00:00',
                'updated_at' => '2025-10-27 12:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'E-commerce',
                'slug' => 'e_commerce',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-10-27 12:00:00',
                'updated_at' => '2025-10-27 12:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Retail Store',
                'slug' => 'retail_store',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-10-27 12:00:00',
                'updated_at' => '2025-10-27 12:00:00',
            ),
        ));


    }
}
