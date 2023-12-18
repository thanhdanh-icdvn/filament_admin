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
            DepartmentSeeder::class,
            RegionSeeder::class,
            SubRegionSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CategorySeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
        ]);
    }
}
