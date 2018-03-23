<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\NewBets;
use App\Http\Resources\BetResource;
use App\Models\Bet;
use App\Models\Currency;
use App\Models\Group;
use App\Models\Payment;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BetsController extends Controller
{
    public function store(NewBets $request)
    {
        $currency = Currency::find($request->input('currency_id'));
        $types = Type::whereIn('id', $request->input('type_ids'))->get();
        $amount = Type::getAmount($types);
        $payment = Payment::createForCurrency($currency, $amount);
        $bets = Bet::createForCurrency($currency, $types, $payment);

        return BetResource::collection($bets);
    }
}
