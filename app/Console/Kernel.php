<?php

namespace App\Console;

use App\Models\Test;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Str;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('corn:job')->everyMinute();
        $schedule->call(function () {
            $test = new Test();
            $test->name = Str::random(3);
            $test->save();
                })->everyMinute()->days([Schedule::SUNDAY,Schedule::MONDAY,Schedule::TUESDAY,Schedule::WEDNESDAY, Schedule::THURSDAY]);

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
