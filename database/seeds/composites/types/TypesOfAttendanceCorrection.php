<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfAttendanceCorrection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'check-in',
            'name' => 'Check In',
            'of'   => 'attendance-correction',
        ]);

        Type::create([
            'code' => 'check-out',
            'name' => 'Check Out',
            'of'   => 'attendance-correction',
        ]);
       
    }
}
