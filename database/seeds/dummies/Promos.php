<?php

use App\Models\Promo;
use Illuminate\Database\Seeder;

class Promos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Promo::class, config('memfis.dummies.promos'))->create();
    }
}
