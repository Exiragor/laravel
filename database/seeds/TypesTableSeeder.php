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
            'any_letter', 'odd_number', 'even_number',
            'letter_a', 'letter_b', 'letter_c', 'letter_d', 'letter_e', 'letter_f',
            'number_0', 'number_2', 'number_4', 'number_6', 'number_8',
            'number_1', 'number_3', 'number_5', 'number_7', 'number_9'
        ];

        foreach ($values as $value) {
            if (Type::where(compact('value'))->exists()) continue;

            factory(Type::class)->states($value)->create();
        }
    }
}
