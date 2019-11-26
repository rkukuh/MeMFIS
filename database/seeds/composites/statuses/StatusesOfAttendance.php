<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfAttendance extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'absence',
            'name' => 'ABSENCE',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'late',
            'name' => 'LATE',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'very-late',
            'name' => 'VERY LATE',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'earlier-leave',
            'name' => 'EARLIER LEAVE',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'normal',
            'name' => 'NORMAL',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'undiscipline',
            'name' => 'UNDISCIPLINE',
            'of'   => 'attendance',
        ]);

    }
}
