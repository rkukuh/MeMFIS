<?php

use App\Models\RIR;
use Illuminate\Database\Seeder;

class RIRs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RIR::class, config('memfis.dummies.rirs'))->create();
    }
}
