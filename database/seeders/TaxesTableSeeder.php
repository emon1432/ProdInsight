<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taxes')->delete();
        
        \DB::table('taxes')->insert(array (
            0 => 
            array (
                'id' => 1,
            'name' => 'VAT (Value Added Tax)',
                'slug' => 'vat-value-added-tax',
                'type' => 'Exclusive',
                'rate' => 15.0,
                'calculation_method' => 'Percentage',
                'scope' => 'Product',
                'status' => 'Active',
                'description' => 'Standard Value Added Tax applied to most goods and services',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sales Tax',
                'slug' => 'sales-tax',
                'type' => 'Exclusive',
                'rate' => 8.25,
                'calculation_method' => 'Percentage',
                'scope' => 'Product',
                'status' => 'Active',
                'description' => 'State sales tax applicable to retail products',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Service Tax',
                'slug' => 'service-tax',
                'type' => 'Inclusive',
                'rate' => 12.0,
                'calculation_method' => 'Percentage',
                'scope' => 'Sales',
                'status' => 'Active',
                'description' => 'Tax applied to services and consultancy',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Import Duty',
                'slug' => 'import-duty',
                'type' => 'Exclusive',
                'rate' => 50.0,
                'calculation_method' => 'Fixed',
                'scope' => 'Product',
                'status' => 'Active',
                'description' => 'Fixed import duty on imported raw materials',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Luxury Tax',
                'slug' => 'luxury-tax',
                'type' => 'Exclusive',
                'rate' => 25.0,
                'calculation_method' => 'Percentage',
                'scope' => 'Product',
                'status' => 'Active',
                'description' => 'Higher tax rate for luxury items and premium products',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Zero Rate GST',
                'slug' => 'zero-rate-gst',
                'type' => 'Exclusive',
                'rate' => 0.0,
                'calculation_method' => 'Percentage',
                'scope' => 'Product',
                'status' => 'Active',
                'description' => 'Zero-rated goods and services under GST',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Export Tax',
                'slug' => 'export-tax',
                'type' => 'Inclusive',
                'rate' => 5.0,
                'calculation_method' => 'Percentage',
                'scope' => 'Sales',
                'status' => 'Inactive',
            'description' => 'Tax applied to exported goods (currently suspended)',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Environmental Tax',
                'slug' => 'environmental-tax',
                'type' => 'Exclusive',
                'rate' => 10.0,
                'calculation_method' => 'Fixed',
                'scope' => 'Product',
                'status' => 'Active',
                'description' => 'Environmental protection tax on certain products',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-12 00:00:00',
                'updated_at' => '2025-10-12 00:00:00',
            ),
        ));
        
        
    }
}