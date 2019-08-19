<?php

use App\Models\Workshift;
use Illuminate\Database\Seeder;

class Workshifts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Workshift::class, config('memfis.dummies.workshifts'))->create();
    }
}
