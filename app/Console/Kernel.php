<?php

namespace App\Console;

use App\Events\NewWinners;
use App\Models\Bet;
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
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $letters = ['a', 'b', 'c', 'd', 'e', 'f'];
            $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
            $posible_vars =  $letters + $numbers;

            $rand_val = array_rand($posible_vars);

            if (in_array($rand_val, $numbers)) {
                if ($rand_val % 2 == 0)
                    $symbol_type = 'even_num';
                else
                    $symbol_type = 'odd_num';
            } else {
                $symbol_type = 'letter';
            }
            $time = Carbon::now()->subMinutes(15)->toDateTimeString();
            $winners = Bet::where([
                ['created_at', '>=', $time],
                ['value', $rand_val],
                ['winner', false]
            ])->orWhere([
                ['created_at', '>=', $time],
                ['value', $symbol_type],
                ['winner', false]
            ])->get();

            foreach ($winners as $winner) {
                $winner->winner = true;
                $winner->save();
            }

            event(new NewWinners($winners, $rand_val));

        })->everyMinute();
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
