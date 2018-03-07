<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rate_amount' => $rate_amount = 0.3,
        'rate_index' => $rate_index = $faker->randomFloat(2, 0, 10),
        'rate_profit' => ($rate_amount * $rate_index),
    ];
});
