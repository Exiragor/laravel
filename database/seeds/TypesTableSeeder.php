<?php

use App\Models\Type;

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'any_letter', 'any_odd_number', 'any_even_number',
            'letter_a', 'letter_b', 'letter_c', 'letter_d', 'letter_e', 'letter_f',
            'even_number_0', 'even_number_2', 'even_number_4', 'even_number_6', 'even_number_8',
            'odd_number_1', 'odd_number_3', 'odd_number_5', 'odd_number_7', 'odd_number_9',
        ];

        foreach ($values as $value) {
            if (Type::where(compact('value'))->exists()) continue;

            factory(Type::class)->states($value)->create();
        }
    }
}
