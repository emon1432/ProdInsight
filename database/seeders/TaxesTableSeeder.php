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
                'calculation_method' => 'Percentage',
                'rate' => 15.00,
                'type' => 'Exclusive',
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
                'calculation_method' => 'Percentage',
                'rate' => 8.25,
                'type' => 'Exclusive',
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
                'calculation_method' => 'Percentage',
                'rate' => 12.00,
                'type' => 'Inclusive',
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
                'calculation_method' => 'Fixed',
                'rate' => 50.00,
                'type' => 'Exclusive',
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
                'calculation_method' => 'Percentage',
                'rate' => 25.00,
                'type' => 'Exclusive',
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
                'calculation_method' => 'Percentage',
                'rate' => 0.00,
                'type' => 'Exclusive',
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
                'calculation_method' => 'Percentage',
                'rate' => 5.00,
                'type' => 'Inclusive',
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
                'calculation_method' => 'Fixed',
                'rate' => 10.00,
                'type' => 'Exclusive',
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
