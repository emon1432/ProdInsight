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

        \DB::table('settings')->insert(array(
            0 =>
            array(
                'id' => 1,
                'icon' => 'briefcase',
                'key' => 'business_settings',
                'value' => '{"company_name":"ProdInsight","company_logo":"uploads\\/logo.png","company_favicon":"uploads\\/favicon.ico","email":"info@prodinsight.com","phone":"01638849305","address":"Dhaka, Bangladesh"}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-05-27 04:43:11',
            ),
            1 =>
            array(
                'id' => 2,
                'icon' => 'settings',
                'key' => 'system_settings',
                'value' => '{"app_name":"ProdInsight","app_url":"https:\\/\\/prodinsight.com","app_locale":"en","app_timezone":"Asia\\/Dhaka","date_format":"Y-m-d","maintenance_mode":"0","footer_text":null,"copyright":"Copyright \\u00a9 2025 ProdInsight"}',
                'created_at' => '2025-04-19 05:17:43',
                'updated_at' => '2025-05-27 07:31:30',
            ),
            2 =>
            array(
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
