<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $response = \Http::withoutVerifying()->get('https://api.vietqr.io/v2/banks');

            if ($response->status() === 200) {
                $jsonData = $response->json();
                $banks = $jsonData['data'];
                foreach ($banks as $bank) {
                    Bank::create([
                        'name' => $bank['name'],
                        'code' => $bank['code'],
                        'bin' => $bank['bin'],
                        'shortName' => $bank['shortName'],
                        'logo' => $bank['logo'],
                        'transferSupported' => $bank['transferSupported'],
                        'lookupSupported' => $bank['lookupSupported'],
                    ]);
                }
                // dd($jsonData);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
