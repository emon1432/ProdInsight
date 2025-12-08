<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('attributes')->delete();

        \DB::table('attributes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Color',
                'slug' => 'color',
                'code' => 'CLR',
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
                'name' => 'Size',
                'slug' => 'size',
                'code' => 'SZ',
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
                'name' => 'Material',
                'slug' => 'material',
                'code' => 'MAT',
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
                'name' => 'Weight',
                'slug' => 'weight',
                'code' => 'WGT',
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
                'name' => 'Finish',
                'slug' => 'finish',
                'code' => 'FNH',
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
                'name' => 'Grade',
                'slug' => 'grade',
                'code' => 'GRD',
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
                'name' => 'Thickness',
                'slug' => 'thickness',
                'code' => 'THK',
                'status' => 'Active',
                'created_by' => 1,
                'deleted_at' => NULL,
                'deleted_by' => NULL,
                'created_at' => '2025-12-08 10:00:00',
                'updated_at' => '2025-12-08 10:00:00',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Pattern',
                'slug' => 'pattern',
                'code' => 'PTN',
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
                'name' => 'Capacity',
                'slug' => 'capacity',
                'code' => 'CAP',
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
                'name' => 'Temperature Rating',
                'slug' => 'temperature-rating',
                'code' => 'TEMP',
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
