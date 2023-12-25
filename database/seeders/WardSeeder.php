<?php

namespace Database\Seeders;

use App\Models\Ward;
use DB;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunkSize = 500;
        try {
            DB::beginTransaction();
            $response = \Http::withoutVerifying()->get('https://provinces.open-api.vn/api/w/');

            if ($response->status() === 200) {
                $jsonData = $response->json();
                $provinces = $jsonData;
                collect($provinces)->chunk($chunkSize)->each(function ($chunkedProvinces) {
                    // Process each chunk of provinces
                    foreach ($chunkedProvinces as $province) {
                        Ward::query()->createOrFirst([
                            'name' => $province['name'],
                            'code' => $province['code'],
                            'division_type' => $province['division_type'],
                            'codename' => $province['codename'],
                            'district_code' => $province['district_code'],
                        ]);
                    }
                });
                DB::commit(); // Commit the transaction if everything is successful
            }
        } catch (\Throwable $th) {
            DB::rollBack(); // Rollback the transaction in case of an exception
            throw $th;
        }
    }
}
