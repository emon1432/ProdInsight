<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Khairul Islam Emon',
                'email' => 'admin@verticasoft.com',
                'phone' => '01638849305',
                'password' => '$2y$12$atEjRCnSoCeKnbOCT6a.p.EWTQ7GzU97eInXEyEp0OHnVd6vH4Dnm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => NULL,
                'remember_token' => 'Sj8nXaG35X',
                'email_verified_at' => '2025-04-19 05:17:43',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-04-19 05:17:43',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'Khairul Islam Emon',
                'email' => 'admin@wanitbd.com',
                'phone' => '01521437220',
                'password' => '$2y$12$atEjRCnSoCeKnbOCT6a.p.EWTQ7GzU97eInXEyEp0OHnVd6vH4Dnm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => NULL,
                'remember_token' => 'Sj8nXaG35X',
                'email_verified_at' => '2025-04-19 05:17:43',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-04-19 05:17:43',
            ),
        ));

        
    }
}