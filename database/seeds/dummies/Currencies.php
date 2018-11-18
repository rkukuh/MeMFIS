<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class Currencies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Currency::class, config('memfis.dummies.currencies'))->create();
    }
}
