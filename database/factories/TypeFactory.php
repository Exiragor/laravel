<?php

use App\Models\Type;

use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'group' => $faker->title,
        'symbol' => $faker->unique()->randomLetter,
    ];
});

$factory->state(Type::class, 'any_letter', [
    'name' => 'any_letter',
    'group' => 'common',
    'symbol' => 'null',
]);

$factory->state(Type::class, 'any_even_number', [
    'name' => 'any_even_number',
    'group' => 'common',
    'symbol' => 'null',
]);

$factory->state(Type::class, 'any_odd_number', [
    'name' => 'any_odd_number',
    'group' => 'common',
    'symbol' => 'null',
]);

$factory->state(Type::class, 'letter_a', [
    'name' => 'letter_a',
    'group' => 'letter',
    'symbol' => 'a',
]);

$factory->state(Type::class, 'letter_b', [
    'name' => 'letter_b',
    'group' => 'letter',
    'symbol' => 'b',
]);

$factory->state(Type::class, 'letter_c', [
    'name' => 'letter_c',
    'group' => 'letter',
    'symbol' => 'c',
]);

$factory->state(Type::class, 'letter_d', [
    'name' => 'letter_d',
    'group' => 'letter',
    'symbol' => 'd',
]);

$factory->state(Type::class, 'letter_e', [
    'name' => 'letter_e',
    'group' => 'letter',
    'symbol' => 'e',
]);

$factory->state(Type::class, 'letter_f', [
    'name' => 'letter_f',
    'group' => 'letter',
    'symbol' => 'f',
]);

$factory->state(Type::class, 'even_number_0', [
    'name' => 'even_number_0',
    'group' => 'even_number',
    'symbol' => '0',
]);

$factory->state(Type::class, 'odd_number_1', [
    'name' => 'odd_number_1',
    'group' => 'odd_number',
    'symbol' => '1',
]);

$factory->state(Type::class, 'even_number_2', [
    'name' => 'even_number_2',
    'group' => 'even_number',
    'symbol' => '2',
]);

$factory->state(Type::class, 'odd_number_3', [
    'name' => 'odd_number_3',
    'group' => 'odd_number',
    'symbol' => '3',
]);

$factory->state(Type::class, 'even_number_4', [
    'name' => 'even_number_4',
    'group' => 'even_number',
    'symbol' => '4',
]);

$factory->state(Type::class, 'odd_number_5', [
    'name' => 'odd_number_5',
    'group' => 'odd_number',
    'symbol' => '5',
]);

$factory->state(Type::class, 'even_number_6', [
    'name' => 'even_number_6',
    'group' => 'even_number',
    'symbol' => '6',
]);

$factory->state(Type::class, 'odd_number_7', [
    'name' => 'odd_number_7',
    'group' => 'odd_number',
    'symbol' => '7',
]);

$factory->state(Type::class, 'even_number_8', [
    'name' => 'even_number_8',
    'group' => 'even_number',
    'symbol' => '8',
]);

$factory->state(Type::class, 'odd_number_9', [
    'name' => 'odd_number_9',
    'group' => 'odd_number',
    'symbol' => '9',
]);

