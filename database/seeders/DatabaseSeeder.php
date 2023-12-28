<?php

namespace Database\Seeders;

use Database\Seeders\Auth\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
            ServiceSeeder::class,
            OfferImageSeeder::class,
            ProductCategorySeeder::class,
            BrandSeeder::class,
        ]);
    }
}
