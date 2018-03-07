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
        $currencies = ['btc'];

        foreach ($currencies as $currency) {
            factory(Currency::class)->states($currency)->create();
        }
    }
}
