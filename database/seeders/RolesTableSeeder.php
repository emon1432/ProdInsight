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
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-04-19 05:17:43',
            ),
        ));
        
        
    }
}