<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $response = \Http::withoutVerifying()->get('https://provinces.open-api.vn/api/p/');

            if ($response->status() === 200) {
                $jsonData = $response->json();
                $provinces = $jsonData;
                foreach ($provinces as $province) {
                    Province::create([
                        'name' => $province['name'],
                        'code' => $province['code'],
                        'division_type' => $province['division_type'],
                        'codename' => $province['codename'],
                        'phone_code' => $province['phone_code'],
                    ]);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
