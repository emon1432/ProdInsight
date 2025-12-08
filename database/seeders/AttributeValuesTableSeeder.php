<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('attribute_values')->delete();

        \DB::table('attribute_values')->insert(array (
            // Color attribute values
            0 =>
            array (
                'id' => 1,
                'name' => 'Red',
                'slug' => 'red',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Blue',
                'slug' => 'blue',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Green',
                'slug' => 'green',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Black',
                'slug' => 'black',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'White',
                'slug' => 'white',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Silver',
                'slug' => 'silver',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Gray',
                'slug' => 'gray',
                'attribute_id' => 1,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Size attribute values
            7 =>
            array (
                'id' => 8,
                'name' => 'Small',
                'slug' => 'small',
                'attribute_id' => 2,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Medium',
                'slug' => 'medium',
                'attribute_id' => 2,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Large',
                'slug' => 'large',
                'attribute_id' => 2,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Extra Large',
                'slug' => 'extra-large',
                'attribute_id' => 2,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Material attribute values
            11 =>
            array (
                'id' => 12,
                'name' => 'Steel',
                'slug' => 'steel',
                'attribute_id' => 3,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Aluminum',
                'slug' => 'aluminum',
                'attribute_id' => 3,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Plastic',
                'slug' => 'plastic',
                'attribute_id' => 3,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Wood',
                'slug' => 'wood',
                'attribute_id' => 3,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Rubber',
                'slug' => 'rubber',
                'attribute_id' => 3,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Copper',
                'slug' => 'copper',
                'attribute_id' => 3,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Weight attribute values
            17 =>
            array (
                'id' => 18,
                'name' => 'Light (< 1kg)',
                'slug' => 'light',
                'attribute_id' => 4,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Medium (1-5kg)',
                'slug' => 'medium-weight',
                'attribute_id' => 4,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Heavy (> 5kg)',
                'slug' => 'heavy',
                'attribute_id' => 4,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Finish attribute values
            20 =>
            array (
                'id' => 21,
                'name' => 'Matte',
                'slug' => 'matte',
                'attribute_id' => 5,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Glossy',
                'slug' => 'glossy',
                'attribute_id' => 5,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Polished',
                'slug' => 'polished',
                'attribute_id' => 5,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Brushed',
                'slug' => 'brushed',
                'attribute_id' => 5,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Powder Coated',
                'slug' => 'powder-coated',
                'attribute_id' => 5,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Grade attribute values
            25 =>
            array (
                'id' => 26,
                'name' => 'Grade A',
                'slug' => 'grade-a',
                'attribute_id' => 6,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Grade B',
                'slug' => 'grade-b',
                'attribute_id' => 6,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Grade C',
                'slug' => 'grade-c',
                'attribute_id' => 6,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Premium',
                'slug' => 'premium',
                'attribute_id' => 6,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Standard',
                'slug' => 'standard',
                'attribute_id' => 6,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Thickness attribute values
            30 =>
            array (
                'id' => 31,
                'name' => '1mm',
                'slug' => '1mm',
                'attribute_id' => 7,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            31 =>
            array (
                'id' => 32,
                'name' => '2mm',
                'slug' => '2mm',
                'attribute_id' => 7,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            32 =>
            array (
                'id' => 33,
                'name' => '3mm',
                'slug' => '3mm',
                'attribute_id' => 7,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            33 =>
            array (
                'id' => 34,
                'name' => '5mm',
                'slug' => '5mm',
                'attribute_id' => 7,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            34 =>
            array (
                'id' => 35,
                'name' => '10mm',
                'slug' => '10mm',
                'attribute_id' => 7,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Pattern attribute values
            35 =>
            array (
                'id' => 36,
                'name' => 'Plain',
                'slug' => 'plain',
                'attribute_id' => 8,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'Striped',
                'slug' => 'striped',
                'attribute_id' => 8,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            37 =>
            array (
                'id' => 38,
                'name' => 'Textured',
                'slug' => 'textured',
                'attribute_id' => 8,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            38 =>
            array (
                'id' => 39,
                'name' => 'Perforated',
                'slug' => 'perforated',
                'attribute_id' => 8,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Capacity attribute values
            39 =>
            array (
                'id' => 40,
                'name' => '100L',
                'slug' => '100l',
                'attribute_id' => 9,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            40 =>
            array (
                'id' => 41,
                'name' => '250L',
                'slug' => '250l',
                'attribute_id' => 9,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            41 =>
            array (
                'id' => 42,
                'name' => '500L',
                'slug' => '500l',
                'attribute_id' => 9,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            42 =>
            array (
                'id' => 43,
                'name' => '1000L',
                'slug' => '1000l',
                'attribute_id' => 9,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            // Temperature Rating attribute values
            43 =>
            array (
                'id' => 44,
                'name' => 'Low (-20°C to 50°C)',
                'slug' => 'low-temp',
                'attribute_id' => 10,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'Medium (50°C to 150°C)',
                'slug' => 'medium-temp',
                'attribute_id' => 10,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            45 =>
            array (
                'id' => 46,
                'name' => 'High (150°C to 300°C)',
                'slug' => 'high-temp',
                'attribute_id' => 10,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'Extreme (> 300°C)',
                'slug' => 'extreme-temp',
                'attribute_id' => 10,
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
        ));


    }
}
