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
            'name' => 'Absence',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'late',
            'name' => 'Late',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'very-late',
            'name' => 'Veru Late',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'earlier-leave',
            'name' => 'Earlier Leave',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'normal',
            'name' => 'Normal',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'on-leave',
            'name' => 'On Leave',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'undiscipline',
            'name' => 'Undiscipline',
            'of'   => 'attendance',
        ]);

    }
}
