<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('brands')->delete();

        \DB::table('brands')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Acme Foods',
                'slug' => 'acme-foods',
                'code' => 'ACME',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Acme Foods - Quality Ingredients',
                'meta_keywords' => 'acme,foods,ingredients',
                'meta_description' => 'Acme Foods supplies premium ingredients for food manufacturers.',
                'description' => 'Acme Foods is a leading supplier of high-quality food ingredients for the commercial market.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-24 19:20:53',
                'updated_at' => '2025-10-24 19:20:53',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'PureCraft',
                'slug' => 'purecraft',
                'code' => 'PURE',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'PureCraft Artisan Goods',
                'meta_keywords' => 'purecraft,artisan,handmade',
                'meta_description' => 'PureCraft produces small-batch artisan ingredients and products.',
                'description' => 'PureCraft focuses on handcrafted products using sustainable practices.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-24 19:20:54',
                'updated_at' => '2025-10-24 19:20:54',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'GreenFields',
                'slug' => 'greenfields',
                'code' => 'GFIELDS',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'GreenFields Natural',
                'meta_keywords' => 'greenfields,natural,organic',
                'meta_description' => 'GreenFields supplies organic raw materials and natural ingredients.',
                'description' => 'GreenFields is committed to organic farming and traceable supply chains.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-24 19:20:54',
                'updated_at' => '2025-10-24 19:20:54',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'ProBake Supplies',
                'slug' => 'probake-supplies',
                'code' => 'PROBAKE',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'ProBake Supplies',
                'meta_keywords' => 'probake,bakery,supplies',
                'meta_description' => 'ProBake provides bakery-grade raw materials and mixes.',
                'description' => 'ProBake is a trusted partner for commercial bakeries and pastry chefs.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-24 19:20:54',
                'updated_at' => '2025-10-24 19:20:54',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Omega Oils',
                'slug' => 'omega-oils',
                'code' => 'OMEGA',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Omega Oils',
                'meta_keywords' => 'omega,oils,vegetable oils',
                'meta_description' => 'Omega Oils offers refined and specialty oils for production.',
                'description' => 'Omega Oils supplies a wide range of edible and industrial oils.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-24 19:20:54',
                'updated_at' => '2025-10-24 19:20:54',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Legacy Spices Co',
                'slug' => 'legacy-spices-co',
                'code' => 'LEGSPICE',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Legacy Spices Co',
                'meta_keywords' => 'spices,legacy,flavor',
                'meta_description' => 'Legacy Spices Co supplies premium spice blends and single-origin spices.',
                'description' => 'Legacy Spices sources rare and high-quality spices from around the world.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-24 19:20:54',
                'updated_at' => '2025-10-24 19:20:54',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'SunHarvest',
                'slug' => 'sunharvest',
                'code' => 'SUNHARV',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'SunHarvest Produce',
                'meta_keywords' => 'sunharvest,produce,fresh',
                'meta_description' => 'SunHarvest supplies fresh produce and dehydrated vegetables.',
                'description' => 'SunHarvest is known for farm-to-factory produce sourcing and quality control.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-25 10:00:00',
                'updated_at' => '2025-10-25 10:00:00',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'BlueHaven Dairy',
                'slug' => 'bluehaven-dairy',
                'code' => 'BLUEHAV',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'BlueHaven Dairy Products',
                'meta_keywords' => 'bluehaven,dairy,milk,cheese',
                'meta_description' => 'BlueHaven offers pasteurized dairy ingredients for food production.',
                'description' => 'BlueHaven specializes in dairy powders, whey, and concentrated dairy ingredients.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-25 10:00:00',
                'updated_at' => '2025-10-25 10:00:00',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'NutriMax',
                'slug' => 'nutrimax',
                'code' => 'NUTRIMAX',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'NutriMax Nutraceuticals',
                'meta_keywords' => 'nutrimax,nutrition,supplements',
                'meta_description' => 'NutriMax manufactures nutrition concentrates and vitamin premixes.',
                'description' => 'NutriMax provides fortified ingredients and premixes for health-focused products.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-25 10:00:00',
                'updated_at' => '2025-10-25 10:00:00',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Crystal Sugars',
                'slug' => 'crystal-sugars',
                'code' => 'CRYSTAL',
                'status' => 'Active',
                'image' => NULL,
                'meta_title' => 'Crystal Sugars Co',
                'meta_keywords' => 'sugar,crystal,sweeteners',
                'meta_description' => 'Crystal Sugars supplies white and specialty sugars for industry.',
                'description' => 'Crystal Sugars provides refined, invert, and specialty sugar products.',
                'created_by' => 1,
                'deleted_at' => NULL,
                'created_at' => '2025-10-25 10:00:00',
                'updated_at' => '2025-10-25 10:00:00',
            ),
        ));


    }
}
