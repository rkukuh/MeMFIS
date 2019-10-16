<?php

use App\Models\FefoIn;
use Illuminate\Database\Seeder;

class FefoIns extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FefoIn::class, config('memfis.dummies.fefo_ins'))->create();
    }
}
