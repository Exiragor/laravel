<?php

namespace App\Console\Commands;

use App\Models\Bet;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Console\Command;

class lottery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start and handle lottery game!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $game = Game::getInstance();
        $game->lottery();
    }
}
