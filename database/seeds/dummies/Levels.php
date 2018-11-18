<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class Levels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Level::class, config('memfis.dummies.levels'))->create();
    }
}
