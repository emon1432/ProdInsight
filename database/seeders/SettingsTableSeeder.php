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
                'icon' => 'briefcase',
                'key' => 'business_settings',
                'value' => '{"company_name":"ProdInsight","email":"info@prodinsight.com","phone":"01638849305","address":"Dhaka, Bangladesh","tax_collection":"1","tax_registration_number":null,"tax_type":"inclusive","logo":"uploads\\/settings\\/prodinsight1748758913683bf1815b1a7.jpg","favicon":"uploads\\/settings\\/prodinsight1748758913683bf1815cf0f.png"}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-10-11 18:15:41',
            ),
            1 =>
            array (
                'id' => 2,
                'icon' => 'settings',
                'key' => 'system_settings',
                'value' => '{"app_name":"ProdInsight","app_url":"https:\\/\\/prodinsight.com","app_locale":"en","app_timezone":"Asia\\/Dhaka","date_format":"Y-m-d","currency_id":"1","decimal_separator":".","thousand_separator":",","decimal_precision":"2","footer_text":"\\u00a9 2025 ProdInsight. All rights reserved.","copyright":"Copyright \\u00a9 2025 ProdInsight","logo":null,"favicon":null}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-06-28 06:05:46',
            ),
            2 =>
            array (
                'id' => 3,
                'icon' => 'mail',
                'key' => 'mail_settings',
                'value' => '{"mail_driver":"smtp","mail_host":"sandbox.smtp.mailtrap.io","mail_port":"2525","mail_username":"fa39ddca0a2a4f","mail_password":"89a49d9d605777","mail_encryption":"tls","mail_from_address":"info@prodinsight.com","mail_from_name":"ProdInsight"}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-05-27 06:24:37',
            ),
        ));


    }
}
