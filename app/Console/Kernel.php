<?php

namespace App\Console;

use App\Console\Commands\MakeView;
use App\Console\Commands\UpdateBanksCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Stringable;

class Kernel extends ConsoleKernel
{
    /**
     * Command list
     */
    protected $commands = [
        MakeView::class,
        UpdateBanksCommand::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('update:banks')->dailyAt('05:00')->timezone('Asia/Ho_Chi_Minh')
            ->thenWithOutput(function (Stringable $output) {
                echo 'update:banks: '.$output;
            })
            ->emailOutputOnFailure(env('MAIL_USERNAME', 'danhthanh418@gmail.com'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
