<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NonInventoryItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('non_inventory_items')->delete();
        
        \DB::table('non_inventory_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Machine Maintenance Service',
                'slug' => 'machine-maintenance-service',
                'code' => 'SRV-MNT-001',
                'status' => 'Active',
                'description' => 'Regular maintenance and repair services for production machinery',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Equipment Calibration',
                'slug' => 'equipment-calibration',
                'code' => 'SRV-CAL-002',
                'status' => 'Active',
                'description' => 'Precision calibration services for measuring instruments',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Quality Inspection Service',
                'slug' => 'quality-inspection-service',
                'code' => 'SRV-QIS-003',
                'status' => 'Active',
                'description' => 'Third-party quality inspection and certification services',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Transportation & Logistics',
                'slug' => 'transportation-logistics',
                'code' => 'SRV-TRA-004',
                'status' => 'Active',
                'description' => 'Freight and logistics services for raw material delivery',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Energy & Utilities',
                'slug' => 'energy-utilities',
                'code' => 'UTL-ENR-005',
                'status' => 'Active',
                'description' => 'Electricity, gas, and water utilities for production facility',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Software License',
                'slug' => 'software-license',
                'code' => 'LIC-SFT-006',
                'status' => 'Active',
                'description' => 'Annual software licenses for production management systems',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Employee Training',
                'slug' => 'employee-training',
                'code' => 'TRN-EMP-007',
                'status' => 'Active',
                'description' => 'Professional training programs for staff development',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Safety Equipment Service',
                'slug' => 'safety-equipment-service',
                'code' => 'SRV-SAF-008',
                'status' => 'Active',
                'description' => 'Maintenance and inspection of safety equipment and systems',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Waste Management',
                'slug' => 'waste-management',
                'code' => 'SRV-WST-009',
                'status' => 'Active',
                'description' => 'Industrial waste disposal and recycling services',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Security Services',
                'slug' => 'security-services',
                'code' => 'SRV-SEC-010',
                'status' => 'Active',
                'description' => 'Physical security and surveillance services for facility',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-29 09:32:31',
                'updated_at' => '2025-06-29 09:32:31',
            ),
        ));
        
        
    }
}