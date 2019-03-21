<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfMaintenanceCycle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'flight-hour',
            'name' => 'FH (Flight Hour)',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'flight-cycle',
            'name' => 'FC (Flight Cycle)',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'hour',
            'name' => 'HR (Hour)',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'month',
            'name' => 'MO (Month)',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'year',
            'name' => 'YR (Year)',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'a',
            'name' => 'A',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'b',
            'name' => 'B',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'c',
            'name' => 'C',
            'description' => 'Cycle',
            'of'  => 'maintenance-cycle',
        ]);


    }
}
