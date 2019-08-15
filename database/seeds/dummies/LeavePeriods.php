<?php

use App\Models\LeavePeriod;
use Illuminate\Database\Seeder;

class LeavePeriods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LeavePeriod::class, config('memfis.dummies.leaveperiods'))->create();
    }
}
