<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RawMaterialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('raw_materials')->delete();
        

        
    }
}