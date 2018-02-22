<?php

use App\Models\Type;

use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'value' => $faker->unique()->randomLetter,
        'rate_amount' => 0.3,
        'rate_index' => $faker->randomFloat(2, 0, 999),
        'rate_profit' => $faker->randomFloat(8, 0),
    ];
});

$factory->state(Type::class, 'any_letter', [
    'name' => 'Any letter',
    'value' => 'any_letter'
]);

$factory->state(Type::class, 'even_number', [
    'name' => 'Even number',
    'value' => 'even_number'
]);

$factory->state(Type::class, 'odd_number', [
    'name' => 'Odd number',
    'value' => 'odd_number']
);

$factory->state(Type::class, 'letter_a', [
    'name' => 'Letter a',
    'value' => 'letter_a'
]);

$factory->state(Type::class, 'letter_b', [
    'name' => 'Letter b',
    'value' => 'letter_b'
]);

$factory->state(Type::class, 'letter_c', [
    'name' => 'Letter c',
    'value' => 'letter_c'
]);

$factory->state(Type::class, 'letter_d', [
    'name' => 'Letter d',
    'value' => 'letter_d'
]);

$factory->state(Type::class, 'letter_e', [
    'name' => 'Letter e',
    'value' => 'letter_e'
]);

$factory->state(Type::class, 'letter_f', [
    'name' => 'Letter f',
    'value' => 'letter_f'
]);

$factory->state(Type::class, 'number_0', [
    'name' => 'Number 0',
    'value' => 'number_0'
]);

$factory->state(Type::class, 'number_1', [
    'name' => 'Number 1',
    'value' => 'number_1'
]);

$factory->state(Type::class, 'number_2', [
    'name' => 'Number 2',
    'value' => 'number_2'
]);

$factory->state(Type::class, 'number_3', [
    'name' => 'Number 3',
    'value' => 'number_3'
]);

$factory->state(Type::class, 'number_4', [
    'name' => 'Number 4',
    'value' => 'number_4'
]);

$factory->state(Type::class, 'number_5', [
    'name' => 'Number 5',
    'value' => 'number_5'
]);

$factory->state(Type::class, 'number_6', [
    'name' => 'Number 6',
    'value' => 'number_6'
]);

$factory->state(Type::class, 'number_7', [
    'name' => 'Number 7',
    'value' => 'number_7'
]);

$factory->state(Type::class, 'number_8', [
    'name' => 'Number 8',
    'value' => 'number_8'
]);

$factory->state(Type::class, 'number_9', [
    'name' => 'Number 9',
    'value' => 'number_9'
]);

