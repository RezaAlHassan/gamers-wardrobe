<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
     // protected $middleware = [
    // ...Global middleware
   //     \App\Http\Middleware\RedirectIfJson::class,
  //   ];

      // protected $routeMiddleware = [
     // ...Special route middleware
    //    'redirect_if_json' => \App\Http\Middleware\RedirectIfJson::class,
   // ];
    
}
