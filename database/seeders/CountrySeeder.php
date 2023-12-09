<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/csv/countries.csv'), 'r');
        $first_line = true;
        while (($data = fgetcsv($csvFile, null, ',')) !== false) {
            if (! $first_line) {
                Country::create([
                    'id' => $data['0'],
                    'name' => $data['1'],
                    'iso3' => $data['2'],
                    'iso2' => $data['3'],
                    'numeric_code' => $data['4'],
                    'phone_code' => $data['5'],
                    'capital' => $data['6'],
                    'currency' => $data['7'],
                    'currency_name' => $data['8'],
                    'currency_symbol' => $data['9'],
                    'tld' => $data['10'],
                    'native' => $data['11'],
                    'region_id' => empty($data['13']) ? null : $data['13'],
                    'subregion_id' => empty($data['15']) ? null : $data['15'],
                    'nationality' => $data['16'],
                    'timezones' => $data['17'],
                    'latitude' => empty($data['18']) ? null : $data['18'],
                    'longitude' => empty($data['19']) ? null : $data['19'],
                    'emoji' => $data['20'],
                    'emojiU' => $data['21'],
                ]);
            }
            $first_line = false;
        }
        fclose($csvFile);
    }
}
