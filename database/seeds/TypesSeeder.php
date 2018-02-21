<?php

use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Any letter', 'value' => 'any_letter'],
            ['name' => 'Even number', 'value' => 'even_number'],
            ['name' => 'Odd number', 'value' => 'odd_number'],
            ['name' => 'Letter a', 'value' => 'letter_a'],
            ['name' => 'Letter b', 'value' => 'letter_b'],
            ['name' => 'Letter c', 'value' => 'letter_c'],
            ['name' => 'Letter d', 'value' => 'letter_d'],
            ['name' => 'Letter e', 'value' => 'letter_e'],
            ['name' => 'Letter f', 'value' => 'letter_f'],
            ['name' => 'Number 0', 'value' => 'number_0'],
            ['name' => 'Number 1', 'value' => 'number_1'],
            ['name' => 'Number 2', 'value' => 'number_2'],
            ['name' => 'Number 3', 'value' => 'number_3'],
            ['name' => 'Number 4', 'value' => 'number_4'],
            ['name' => 'Number 5', 'value' => 'number_5'],
            ['name' => 'Number 6', 'value' => 'number_6'],
            ['name' => 'Number 7', 'value' => 'number_7'],
            ['name' => 'Number 8', 'value' => 'number_8'],
            ['name' => 'Number 9', 'value' => 'number_9'],
        ];

        foreach ($types as $type) {
            factory(\App\Models\Type::class)->create([
                'name' => $type['name'],
                'value' => $type['value']
            ]);
        }
    }
}
