<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreRequest;
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
    public function store(StoreRequest $request)
    {
        $currency = Currency::find($request->input('currency_id'));
        $types = Type::whereIn('id', $request->input('type_ids'))->get();
        $amount = Type::getAmount($types);
        $payment = Payment::createForCurrency($currency, $amount);
        $bets = Bet::createForPayment($types, $payment);

        $bets->load('type', 'group', 'payment');

        return BetResource::collection($bets);
    }
}
