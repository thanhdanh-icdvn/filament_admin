<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/regions.csv'), 'r');
        $first_line = true;
        while (($data = fgetcsv($csvFile, null, ',')) !== false) {
            if (! $first_line) {
                Region::create([
                    'id' => $data['0'],
                    'name' => $data['1'],
                    'wikiDataId' => $data['2'],
                ]);
            }
            $first_line = false;
        }
        fclose($csvFile);
    }
}
