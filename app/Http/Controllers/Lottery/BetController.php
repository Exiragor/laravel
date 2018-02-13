<?php

namespace App\Http\Controllers\Lottery;

use App\Models\Bet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class BetController extends Controller
{
    public function index() {
        $bets = Bet::all();
        return view('lottery', compact('bets'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'letter' => 'max:1|regex:/[a-fA-f]/|nullable',
            'even_num' => 'max:9|numeric|nullable',
            'odd_num' => 'max:9|numeric|nullable',
            'select' => [
                'nullable',
                Rule::in(['letter', 'odd_num', 'even_num'])
            ]
        ]);

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
            }
        }


        return view('lottery', ['success' => true]);
    }

}
