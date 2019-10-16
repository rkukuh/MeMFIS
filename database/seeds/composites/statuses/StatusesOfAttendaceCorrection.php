<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfAttendanceCorrection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'open',
            'name' => 'OPEN',
            'of'   => 'attendance-correction',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'attendance-correction',
        ]);

    }
}
