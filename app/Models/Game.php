<?php

namespace App\Models;

use App\Events\NewWinners;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    const GAME_TIME = 30;

    private $gameStartTime;
    private $lastWinSymbol;

    protected $fillable = ['start_time', 'winner_symbol'];

    protected $visible = ['start_time', 'winner_symbol'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function lottery() {
        $diffMinutes = Carbon::now()->diffInMinutes(Carbon::parse($this->gameStartTime));
        if ($diffMinutes >= self::GAME_TIME) {
            $symbol = $this->endOfGame();
            $this->startNewGame();
            return $symbol;
        }
        return $diffMinutes;
    }

    public function setTime() {
        $game = self::all()->first();
        if (is_null($game)) {
            $this->gameStartTime = Carbon::now()->toDateTimeString();
            self::create(['start_time' => $this->gameStartTime]);
        } else {
            $this->gameStartTime = $game->start_time;
        }
    }

    private function startNewGame() {
        $this->gameStartTime = Carbon::now()->toDateTimeString();
        $game = self::first()->get();
        $game[0]->start_time = $this->gameStartTime;
        $game[0]->save();
    }

    private function endOfGame() {
        $letters = ['a', 'b', 'c', 'd', 'e', 'f'];
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $posible_vars =  $letters + $numbers;

        $rand_val = array_rand($posible_vars);
        $this->lastWinSymbol = $rand_val;

        if (in_array($rand_val, $numbers)) {
            if ($rand_val % 2 == 0)
                $symbol_type = 'even_num';
            else
                $symbol_type = 'odd_num';
        } else {
            $symbol_type = 'letter';
        }

        $time = Carbon::now()->subMinutes(self::GAME_TIME)->toDateTimeString();
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

        return $rand_val;
    }
}
