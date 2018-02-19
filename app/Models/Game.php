<?php

namespace App\Models;

use App\Events\NewWinners;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    const GAME_TIME = 3; // count of minutes

    private $gameStartTime;

    protected $fillable = ['start_time', 'winner_symbol'];

    protected $visible = ['start_time', 'winner_symbol'];

    public function lottery() {
        $this->setTime();
        $diffMinutes = Carbon::now()->diffInMinutes(Carbon::parse($this->gameStartTime));
        if ($diffMinutes >= self::GAME_TIME) {
            $this->endOfGame();
            $this->startNewGame();
            return true;
        }
        return false;
    }

    private function setTime() {
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
        $symbol = $this->getSymbolFromHash();
        self::update(['winner_symbol' => $symbol]);

        if (is_numeric($symbol)) {
            if ($symbol % 2 == 0)
                $symbol_type = 'even_num';
            else
                $symbol_type = 'odd_num';
        } else {
            $symbol_type = 'letter';
        }


        $time = Carbon::now()->subMinutes(self::GAME_TIME)->toDateTimeString();
        $winners = Bet::orderBy('id', 'desc')->where([
            ['created_at', '>=', $time],
            ['value', $symbol],
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

        event(new NewWinners($winners, $symbol));

        return $symbol;
    }

    private function getSymbolFromHash(): string {
        // method for get hash string of block. but now generating random string
        $hash = self::generateRandomString();
        return substr($hash, strlen($hash) - 1, 1);
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdef';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
