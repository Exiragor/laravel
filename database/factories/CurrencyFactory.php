<?php

use App\Models\Currency;

use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

$factory->state(Currency::class, 'btc', [
    'name' => 'BTC',
]);
