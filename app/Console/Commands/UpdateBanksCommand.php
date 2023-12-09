<?php

namespace App\Console\Commands;

use App\Models\Bank;
use App\Models\User;
use App\Notifications\NotifyUpdateBankTable;
use Illuminate\Console\Command;

class UpdateBanksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:banks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the bank table with data from the API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = \Http::withoutVerifying()->get('https://api.vietqr.io/v2/banks');

            if ($response->status() === 200) {
                $jsonData = $response->json();
                $banks = $jsonData['data'];
                foreach ($banks as $bank) {
                    Bank::updateOrCreate(
                        ['code' => $bank['code']], // match by code
                        [
                            'name' => $bank['name'],
                            'bin' => $bank['bin'],
                            'shortName' => $bank['shortName'],
                            'logo' => $bank['logo'],
                            'transferSupported' => $bank['transferSupported'],
                            'lookupSupported' => $bank['lookupSupported'],
                        ]
                    );
                }
            }

            $admin_user = User::query()
                ->where('email', env('MAIL_USERNAME', 'danhthanh418@gmail.com'))
                ->firstOrFail();

            $admin_user->notify(new NotifyUpdateBankTable);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
