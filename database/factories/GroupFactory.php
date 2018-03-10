<?php

use Faker\Generator as Faker;
use App\Models\Group;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'rate_amount' => $rate_amount = 0.3,
        'rate_index' => $rate_index = $faker->randomFloat(2, 0, 10),
        'rate_profit' => ($rate_amount * $rate_index),
    ];
});

$factory->state(Group::class, 'common', [
    'name' => 'common',
]);

$factory->state(Group::class, 'even_number', [
    'name' => 'even_number',
]);

$factory->state(Group::class, 'odd_number', [
    'name' => 'odd_number',
]);

$factory->state(Group::class, 'letter', [
    'name' => 'letter',
]);
