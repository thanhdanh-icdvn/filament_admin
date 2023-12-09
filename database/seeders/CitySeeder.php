<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/cities.csv'), 'r');
        $firstLine = true;

        // Chunk size for better performance
        $chunkSize = 500;

        DB::beginTransaction();

        try {
            while (($data = fgetcsv($csvFile, null, ',')) !== false) {
                // Skip the first line (header)
                if ($firstLine) {
                    $firstLine = false;

                    continue;
                }

                $rows[] = [
                    'id' => $data[0],
                    'name' => $data[1],
                    'state_id' => $data[2],
                    'latitude' => empty($data[8]) ? null : $data[8],
                    'longitude' => empty($data[9]) ? null : $data[9],
                    'wikiDataId' => empty($data[10]) ? null : $data[10],
                    'created_at' =>now(),
                    'updated_at'=>null
                ];

                if (count($rows) == $chunkSize) {
                    // Insert the chunk into the database
                    City::insert($rows);

                    // Reset the array for the next chunk
                    $rows = [];
                }
            }

            // Insert any remaining rows
            if (! empty($rows)) {
                City::insert($rows);
            }

            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();
            throw $e;
        } finally {
            fclose($csvFile);
        }
    }
}
