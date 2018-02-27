<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\NewBets;
use App\Models\Bet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BetsController extends Controller
{
    public function store(NewBets $request)
    {
        $currency_id = $request->get('currency_id');
        $types_ids = $request->get('types_ids');

        $bets_id = ['test'];
        $types_ids = [1, 2];
        foreach ($types_ids as $type_id) {
            $bet = new Bet();

            $bet->currency_id = $currency_id;
            $bet->type_id = $type_id;

            $bet->save();
        }

        return
    }
}
