<?php

use App\Models\Aircraft;
use Illuminate\Database\Seeder;

class Aircrafts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aircraft::class, config('memfis.dummies.aircrafts'))->create();
    }
}
