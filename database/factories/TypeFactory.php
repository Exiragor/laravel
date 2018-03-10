<?php

use App\Models\Type;
use App\Models\Group;

use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'group_id' => $faker->title,
        'symbol' => $faker->unique()->randomLetter,
    ];
});

$factory->state(Type::class, 'any_letter', [
    'name' => 'any_letter',
    'group_id' => function() { return Group::where('name', 'common')->first()->id; },
    'symbol' => 'null',
]);

$factory->state(Type::class, 'any_even_number', [
    'name' => 'any_even_number',
    'group_id' => function() { return Group::where('name', 'common')->first()->id; },
    'symbol' => 'null',
]);

$factory->state(Type::class, 'any_odd_number', [
    'name' => 'any_odd_number',
    'group_id' => function() { return Group::where('name', 'common')->first()->id; },
    'symbol' => 'null',
]);

$factory->state(Type::class, 'letter_a', [
    'name' => 'letter_a',
    'group_id' => function() { return Group::where('name', 'letter')->first()->id; },
    'symbol' => 'a',
]);

$factory->state(Type::class, 'letter_b', [
    'name' => 'letter_b',
    'group_id' => function() { return Group::where('name', 'letter')->first()->id; },
    'symbol' => 'b',
]);

$factory->state(Type::class, 'letter_c', [
    'name' => 'letter_c',
    'group_id' => function() { return Group::where('name', 'letter')->first()->id; },
    'symbol' => 'c',
]);

$factory->state(Type::class, 'letter_d', [
    'name' => 'letter_d',
    'group_id' => function() { return Group::where('name', 'letter')->first()->id; },
    'symbol' => 'd',
]);

$factory->state(Type::class, 'letter_e', [
    'name' => 'letter_e',
    'group_id' => function() { return Group::where('name', 'letter')->first()->id; },
    'symbol' => 'e',
]);

$factory->state(Type::class, 'letter_f', [
    'name' => 'letter_f',
    'group_id' => function() { return Group::where('name', 'letter')->first()->id; },
    'symbol' => 'f',
]);

$factory->state(Type::class, 'even_number_0', [
    'name' => 'even_number_0',
    'group_id' => function() { return Group::where('name', 'even_number')->first()->id; },
    'symbol' => '0',
]);

$factory->state(Type::class, 'odd_number_1', [
    'name' => 'odd_number_1',
    'group_id' => function() { return Group::where('name', 'odd_number')->first()->id; },
    'symbol' => '1',
]);

$factory->state(Type::class, 'even_number_2', [
    'name' => 'even_number_2',
    'group_id' => function() { return Group::where('name', 'even_number')->first()->id; },
    'symbol' => '2',
]);

$factory->state(Type::class, 'odd_number_3', [
    'name' => 'odd_number_3',
    'group_id' => function() { return Group::where('name', 'odd_number')->first()->id; },
    'symbol' => '3',
]);

$factory->state(Type::class, 'even_number_4', [
    'name' => 'even_number_4',
    'group_id' => function() { return Group::where('name', 'even_number')->first()->id; },
    'symbol' => '4',
]);

$factory->state(Type::class, 'odd_number_5', [
    'name' => 'odd_number_5',
    'group_id' => function() { return Group::where('name', 'odd_number')->first()->id; },
    'symbol' => '5',
]);

$factory->state(Type::class, 'even_number_6', [
    'name' => 'even_number_6',
    'group_id' => function() { return Group::where('name', 'even_number')->first()->id; },
    'symbol' => '6',
]);

$factory->state(Type::class, 'odd_number_7', [
    'name' => 'odd_number_7',
    'group_id' => function() { return Group::where('name', 'odd_number')->first()->id; },
    'symbol' => '7',
]);

$factory->state(Type::class, 'even_number_8', [
    'name' => 'even_number_8',
    'group_id' => function() { return Group::where('name', 'even_number')->first()->id; },
    'symbol' => '8',
]);

$factory->state(Type::class, 'odd_number_9', [
    'name' => 'odd_number_9',
    'group_id' => function() { return Group::where('name', 'odd_number')->first()->id; },
    'symbol' => '9',
]);

