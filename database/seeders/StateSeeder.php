<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/states.csv'), 'r');
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
                    'country_id' => $data[2],
                    'state_code' => $data[5],
                    'type' => empty($data[6]) ? null : $data[6],
                    'latitude' => empty($data[7]) ? null : $data[7],
                    'longitude' => empty($data[8]) ? null : $data[8],
                    'created_at' => now(),
                    'updated_at' => null,
                ];

                if (count($rows) == $chunkSize) {
                    // Insert the chunk into the database
                    State::insert($rows);

                    // Reset the array for the next chunk
                    $rows = [];
                }
            }

            // Insert any remaining rows
            if (! empty($rows)) {
                State::insert($rows);
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
