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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CacheTableSeeder::class);
        $this->call(CacheLocksTableSeeder::class);
        $this->call(JobBatchesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
    }
}
