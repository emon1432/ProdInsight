<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionStagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('production_stages')->delete();
        
        \DB::table('production_stages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Raw Material Procurement',
                'slug' => 'raw-material-procurement',
                'code' => 'RMP',
                'status' => 'Active',
                'description' => 'Stage for procuring and receiving raw materials from suppliers',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Material Preparation',
                'slug' => 'material-preparation',
                'code' => 'MP',
                'status' => 'Active',
                'description' => 'Stage for preparing and processing raw materials for production',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'code' => 'MFG',
                'status' => 'Active',
                'description' => 'Core manufacturing and production stage',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Assembly',
                'slug' => 'assembly',
                'code' => 'ASM',
                'status' => 'Active',
                'description' => 'Stage for assembling components and parts',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Quality Control',
                'slug' => 'quality-control',
                'code' => 'QC',
                'status' => 'Active',
                'description' => 'Stage for quality inspection and testing of products',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Finishing',
                'slug' => 'finishing',
                'code' => 'FIN',
                'status' => 'Active',
                'description' => 'Final finishing and polishing stage',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Packaging',
                'slug' => 'packaging',
                'code' => 'PKG',
                'status' => 'Active',
                'description' => 'Stage for packaging finished products',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Final Inspection',
                'slug' => 'final-inspection',
                'code' => 'FI',
                'status' => 'Active',
                'description' => 'Final quality inspection before shipping',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ready for Dispatch',
                'slug' => 'ready-for-dispatch',
                'code' => 'RFD',
                'status' => 'Active',
                'description' => 'Stage when products are ready for shipping and dispatch',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-07-17 16:57:32',
                'updated_at' => '2025-07-17 16:57:32',
            ),
        ));
        
        
    }
}