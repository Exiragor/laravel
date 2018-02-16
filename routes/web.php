<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Lottery\BetController@index');

Route::post('/', 'Lottery\BetController@store');

Route::get('/event/', function () {
//    event(new \App\Events\BetsUpdated());
    return response("This page for trigger event");
});

Route::get('/lottery/', function () {
    $bets = \App\Models\Bet::take(1)->orderBy('id', 'desc')->get();
    $bet = $bets[0];
    $bet->winner = true;
    $bet->save();
    return response("This page for lottery imitation");
});