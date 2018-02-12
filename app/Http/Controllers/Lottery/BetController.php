<?php

namespace App\Http\Controllers\Lottery;

use App\Models\Bet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BetController extends Controller
{
    public function index() {
        return view('lottery', Bet::getTypes());
    }
}
