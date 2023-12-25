<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $response = \Http::withoutVerifying()->get('https://provinces.open-api.vn/api/d/');

            if ($response->status() === 200) {
                $jsonData = $response->json();
                $districts = $jsonData;
                foreach ($districts as $district) {
                    District::query()->createOrFirst([
                        'name' => $district['name'],
                        'code' => $district['code'],
                        'division_type' => $district['division_type'],
                        'codename' => $district['codename'],
                        'province_code' => $district['province_code'],
                    ]);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
