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
            'code' => 'earlier-leave',
            'name' => 'Earlier Leave',
            'of'   => 'attendance',
        ]);

        /** https://dictionary.cambridge.org/dictionary/english/indiscipline */

        Status::create([
            'code' => 'indiscipline',
            'name' => 'Indiscipline',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'late',
            'name' => 'Late',
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
            'code' => 'overtime',
            'name' => 'Overtime',
            'of'   => 'attendance',
        ]);

        Status::create([
            'code' => 'very-late',
            'name' => 'Very Late',
            'of'   => 'attendance',
        ]);
    }
}
