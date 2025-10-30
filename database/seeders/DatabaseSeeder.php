<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleGroupsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(TaxesTableSeeder::class);
        $this->call(RawMaterialCategoriesTableSeeder::class);
        $this->call(RawMaterialsTableSeeder::class);
        $this->call(NonInventoryItemsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductionStagesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
    }
}
