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
        Currency::create([
            'code'   => 'idr',
            'name'   => 'Rupiah',
            'symbol' => 'Rp',
        ]);

        Currency::create([
            'code'   => 'usd',
            'name'   => 'US Dollar',
            'symbol' => '$',
        ]);
    }
}
