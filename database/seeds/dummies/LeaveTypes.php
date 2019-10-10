<?php

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LeaveType::class, config('memfis.dummies.leavetypes'))->create();
    }
}
