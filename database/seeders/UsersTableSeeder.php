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
                'image' => 'uploads/users/khairul-islam-emon1748759077683bf225059ea.jpg',
                'address' => NULL,
                'remember_token' => 'Sj8nXaG35X',
                'email_verified_at' => '2025-04-19 05:17:43',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-01 06:24:37',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@prodinsight.com',
                'phone' => '+1-555-0124',
                'password' => '$2y$12$vpOmftWFA8tmZ9kLX8ro1uh6U6ZQ66bhUo./hU5WQl843DLewWjUK',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '456 Oak Avenue, Los Angeles, CA 90210',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:29',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'name' => 'Michael Chen',
                'email' => 'michael.chen@prodinsight.com',
                'phone' => '+1-555-0125',
                'password' => '$2y$12$.8c5hX6wY0wqMxIOi6/wpO3saC6jwIbAUsqg8A/vPuJ05cDgdNH0O',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '789 Pine Street, Chicago, IL 60601',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:29',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:29',
                'updated_at' => '2025-06-29 09:32:29',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 4,
                'name' => 'Emily Rodriguez',
                'email' => 'emily.rodriguez@prodinsight.com',
                'phone' => '+1-555-0126',
                'password' => '$2y$12$GUVR9JGl4RTJrnrvF3oQDeBNsKv539FYyp2EQFoLdL8pQIkN6YI8W',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '321 Elm Drive, Houston, TX 77001',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:30',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:30',
                'updated_at' => '2025-06-29 09:32:30',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 5,
                'name' => 'David Wilson',
                'email' => 'david.wilson@prodinsight.com',
                'phone' => '+1-555-0127',
                'password' => '$2y$12$A2AKTCB3Nr6nGRnGWy4vpO8korCdcFlFlMcU0pIcKfptPabQpjLK2',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '654 Maple Lane, Phoenix, AZ 85001',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:30',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:30',
                'updated_at' => '2025-06-29 09:32:30',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 6,
                'name' => 'Lisa Thompson',
                'email' => 'lisa.thompson@prodinsight.com',
                'phone' => '+1-555-0128',
                'password' => '$2y$12$ziGtLa9ZfteTIHCfdWE9MuN/ORJLR7Zesb43vtaEqmEljV9LUsL/6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '987 Cedar Road, Philadelphia, PA 19101',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:30',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:30',
                'updated_at' => '2025-06-29 09:32:30',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 7,
                'name' => 'Robert Garcia',
                'email' => 'robert.garcia@prodinsight.com',
                'phone' => '+1-555-0129',
                'password' => '$2y$12$GwVkitKanUKScW4w7Kxe1e3eEf6I4iZwI8lrjEaHYyZDDw8JdIWyW',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '159 Birch Boulevard, San Antonio, TX 78201',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:30',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:30',
                'updated_at' => '2025-06-29 09:32:30',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 8,
                'name' => 'Jennifer Lee',
                'email' => 'jennifer.lee@prodinsight.com',
                'phone' => '+1-555-0130',
                'password' => '$2y$12$7IFstF9E06lkTlqbqsNcpuLBn7BnaRR.Zeo/9B.c/gBj60XR6o4zm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '753 Walnut Street, San Diego, CA 92101',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:31',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 9,
                'name' => 'Mark Anderson',
                'email' => 'mark.anderson@prodinsight.com',
                'phone' => '+1-555-0131',
                'password' => '$2y$12$CdDrxQO4WwjxiosWRJOGTOd759d8bOb/PtPJqoezRFfoBjAyxJy5u',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '852 Spruce Way, Dallas, TX 75201',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:31',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 10,
                'name' => 'Ashley Brown',
                'email' => 'ashley.brown@prodinsight.com',
                'phone' => '+1-555-0132',
                'password' => '$2y$12$xJrTtXRG/pBiWdGLqMUHe.dJZ2M17jOtS2pLyn2hRw1p7RUslALfm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'image' => NULL,
                'address' => '741 Aspen Circle, San Jose, CA 95101',
                'remember_token' => NULL,
                'email_verified_at' => '2025-06-29 09:32:31',
                'current_team_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
        ));
        
        
    }
}