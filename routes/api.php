<?php

use Illuminate\Http\Request;

Route::get('types', 'Api\TypesController@index');
Route::post('bets', 'Api\BetsController@store');
