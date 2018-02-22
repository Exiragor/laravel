<?php

use App\Models\Currency;

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = ['btc'];

        foreach ($drivers as $driver) {
//            if (Currency::where(compact('driver'))->exists()) continue;
            factory(Currency::class)->states($driver)->create();
        }
    }
}
