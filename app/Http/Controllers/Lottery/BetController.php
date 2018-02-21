<?php

namespace App\Http\Controllers\Lottery;

use App\Events\BetsUpdate;
use App\Events\BetsUpdated;
use App\Http\Requests\NewBets;
use App\Models\Bet;
use App\Http\Controllers\Controller;
use App\Models\Game;


class BetController extends Controller
{
    public function index() {
//        $bets = Bet::take(20)->orderBy('id', 'desc')->get();
//        $winners = Bet::take(5)->orderBy('id', 'desc')->where('winner', true)->get();
//        $win_symbol = Game::first()->winner_symbol;
        return view('main');
    }

    public function store(NewBets $request) {
        $types = Bet::getTypes();
        $req_vars = [
            'select' => $types['type_sel'],
            'letter' => $types['type_let'],
            'odd_num' => $types['type_odd_num'],
            'even_num' => $types['type_even_num']
        ];

        foreach ($req_vars as $key => $type) {
            $var = $request->get($key);
            if ($var) {
                $bet = new Bet();
                $bet->bet_type = $type;
                $bet->value = $var;
                $bet->save();

                event(new BetsUpdated($bet));
            }
        }

        $bets = Bet::take(20)->orderBy('id', 'desc')->get();
        $winners = Bet::take(5)->orderBy('id', 'desc')->where('winner', true)->get();
        $win_symbol = Game::first()->winner_symbol;
        $success = true;
        return view('lottery', compact('bets', 'success', 'winners', 'win_symbol'));
    }

}
