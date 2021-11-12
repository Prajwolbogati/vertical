<?php
namespace App\Console;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\sendRemainderEmail;
use App\Console\Commands\daily;
use App\Console\Commands\delete;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        sendRemainderEmail::class,
         daily::class,
         delete::class,
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('daily:update')->dailyAt('11:22');
         $schedule->command('remainder:emails')->dailyAt('11:22');
         $schedule->command('daily:delete')->dailyAt('11:22');
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
