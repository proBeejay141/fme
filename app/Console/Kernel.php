<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\DeleteFailedPay::class,
        Commands\matchUser::class,
        Commands\MoveMafro::class,
        Commands\clearUser::class,
        Commands\clearNonActive::class,
        Commands\clearRunner::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //
         $schedule->command('clear:failPay')
                  ->everyFiveMinutes();

        $schedule->command('match:user')
                  ->weekdays()->everyThirtyMinutes()
            ->when(function () {
                if (Carbon::now()->dayOfWeek !=6){
                    return true;
                }else{
                    return false;
                }

            });

        $schedule->command('move:mafro')
                  ->everyFiveMinutes();

        $schedule->command('clear:trashUser')
                  ->monthly();

        $schedule->command('clear:nonActive')
                  ->daily();

        $schedule->command('clear:runner')
                  ->everyThirtyMinutes();
    }

    /**

     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
