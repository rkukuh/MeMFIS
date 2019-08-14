<?php

use App\Models\TimeOffPeriod;
use Illuminate\Database\Seeder;

class TimeOffPeriods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TimeOffPeriod::class, config('memfis.dummies.timeoffperiod'))->create();
    }
}
