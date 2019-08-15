<?php

use App\Models\Manhour;
use Illuminate\Database\Seeder;

class Manhours extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Manhour::class, config('memfis.dummies.manhours'))->create();
    }
}
