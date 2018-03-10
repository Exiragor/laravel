<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['common', 'letter', 'even_number', 'odd_number'];

        foreach ($names as $name) {
            if (Group::where(compact('name'))->exists()) continue;

            factory(Group::class)->states($name)->create();
        }
    }
}
