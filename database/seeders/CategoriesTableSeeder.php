<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Automotive Parts',
                'slug' => 'automotive-parts',
                'parent_id' => NULL,
                'code' => 'AUTO-001',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Automotive Parts and Components',
                'meta_keywords' => 'automotive, car parts, vehicle components, manufacturing',
                'meta_description' => 'High-quality automotive parts and components for vehicle manufacturing',
                'description' => 'Complete range of automotive parts including engine components, body parts, and electrical systems',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Industrial Equipment',
                'slug' => 'industrial-equipment',
                'parent_id' => NULL,
                'code' => 'IND-002',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Industrial Equipment and Machinery',
                'meta_keywords' => 'industrial, equipment, machinery, manufacturing tools',
                'meta_description' => 'Professional industrial equipment and machinery for manufacturing processes',
                'description' => 'Heavy-duty industrial equipment designed for manufacturing and production facilities',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Electronics & Components',
                'slug' => 'electronics-components',
                'parent_id' => NULL,
                'code' => 'ELEC-003',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Electronic Components and Devices',
                'meta_keywords' => 'electronics, components, semiconductors, circuits',
                'meta_description' => 'Electronic components and devices for various manufacturing applications',
                'description' => 'Wide range of electronic components including semiconductors, circuits, and control systems',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Consumer Goods',
                'slug' => 'consumer-goods',
                'parent_id' => NULL,
                'code' => 'CONS-004',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Consumer Goods and Products',
                'meta_keywords' => 'consumer goods, retail products, household items',
                'meta_description' => 'Quality consumer goods and retail products for everyday use',
                'description' => 'Manufactured consumer goods ranging from household items to personal care products',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Construction Materials',
                'slug' => 'construction-materials',
                'parent_id' => NULL,
                'code' => 'CONST-005',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Construction Materials and Supplies',
                'meta_keywords' => 'construction, building materials, cement, steel',
                'meta_description' => 'High-grade construction materials and building supplies',
                'description' => 'Comprehensive range of construction materials for building and infrastructure projects',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Engine Components',
                'slug' => 'engine-components',
                'parent_id' => 1,
                'code' => 'AUTO-ENG-006',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Automotive Engine Components',
                'meta_keywords' => 'engine parts, pistons, cylinders, valves',
                'meta_description' => 'Precision-engineered automotive engine components',
                'description' => 'High-performance engine components including pistons, cylinders, valves, and gaskets',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Electrical Systems',
                'slug' => 'electrical-systems',
                'parent_id' => 1,
                'code' => 'AUTO-ELEC-007',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Automotive Electrical Systems',
                'meta_keywords' => 'automotive electronics, wiring, sensors, ECU',
                'meta_description' => 'Advanced automotive electrical systems and components',
                'description' => 'Modern automotive electrical systems including ECUs, sensors, and wiring harnesses',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Manufacturing Tools',
                'slug' => 'manufacturing-tools',
                'parent_id' => 2,
                'code' => 'IND-TOOL-008',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Industrial Manufacturing Tools',
                'meta_keywords' => 'manufacturing tools, CNC, machining, production',
                'meta_description' => 'Professional manufacturing tools and equipment',
                'description' => 'Precision manufacturing tools including CNC machines, lathes, and milling equipment',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Safety Equipment',
                'slug' => 'safety-equipment',
                'parent_id' => 2,
                'code' => 'IND-SAFE-009',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Industrial Safety Equipment',
                'meta_keywords' => 'safety equipment, PPE, protective gear, industrial safety',
                'meta_description' => 'Comprehensive industrial safety equipment and protective gear',
                'description' => 'Complete range of safety equipment including PPE, emergency systems, and protective devices',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Control Systems',
                'slug' => 'control-systems',
                'parent_id' => 3,
                'code' => 'ELEC-CTRL-010',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Electronic Control Systems',
                'meta_keywords' => 'control systems, automation, PLC, SCADA',
                'meta_description' => 'Advanced electronic control systems for industrial automation',
                'description' => 'Sophisticated control systems including PLCs, SCADA systems, and automation controllers',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-06-30 06:33:46',
                'updated_at' => '2025-06-30 06:33:46',
            ),
        ));
        
        
    }
}