<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'value' => $faker->unique()->randomLetter,
        'rate_amount' => 0.3,
        'rate_index' => $faker->randomFloat(2, 0, 999),
        'rate_profit' => $faker->randomFloat(8, 0),
    ];
});
