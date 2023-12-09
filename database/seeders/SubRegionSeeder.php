<?php

namespace Database\Seeders;

use App\Models\SubRegion;
use Illuminate\Database\Seeder;

class SubRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/subregions.csv'), 'r');
        $first_line = true;
        while (($data = fgetcsv($csvFile, null, ',')) !== false) {
            if (! $first_line) {
                SubRegion::create([
                    'id' => $data['0'],
                    'name' => $data['1'],
                    'region_id' => $data['2'],
                    'wikiDataId' => $data['3'],
                ]);
            }
            $first_line = false;
        }
        fclose($csvFile);
    }
}
