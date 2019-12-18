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
            'name' => 'Open',
            'of'   => 'attendance-correction',
        ]);

        Status::create([
            'code' => 'approved',
            'name' => 'Approved',
            'of'   => 'attendance-correction',
        ]);

        Status::create([
            'code' => 'rejected',
            'name' => 'Rejected',
            'of'   => 'attendance-correction',
        ]);

        Status::create([
            'code' => 'void',
            'name' => 'Void',
            'of'   => 'attendance-correction',
        ]);
    }
}
