<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'icon' => 'settings',
                'key' => 'general_settings',
                'value' => '{"company_name":"ProdInsight","email":"info@prodinsight.com","phone":"01638849305"}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-05-27 04:43:11',
            ),
            1 => 
            array (
                'id' => 2,
                'icon' => 'mail',
                'key' => 'mail_settings',
                'value' => '{"mail_driver":"smtp","mail_host":"smtp.mailtrap.io","mail_port":2525,"mail_username":"your_username","mail_password":"your_password","mail_encryption":"tls","mail_from_address":"info@verticasoft.com","mail_from_name":"VerticaSoft"}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-04-19 05:17:43',
            ),
        ));

        
    }
}