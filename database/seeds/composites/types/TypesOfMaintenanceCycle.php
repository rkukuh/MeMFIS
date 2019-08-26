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

        Type::create([
            'code' => 'apu-cng',
            'name' => 'APU CNG',
            'description' => 'APU Change',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'ah',
            'name' => 'AH',
            'description' => 'APU Hours',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'dy',
            'name' => 'DY',
            'description' => 'Days',
            'of'  => 'maintenance-cycle',
        ]);
        
        Type::create([
            'code' => 'eng-cng',
            'name' => 'ENG CNG',
            'description' => 'Engine Change',
            'of'  => 'maintenance-cycle',
        ]);
        
        Type::create([
            'code' => 'ldg-cng',
            'name' => 'LDG CNG',
            'description' => 'Landing Gear Change',
            'of'  => 'maintenance-cycle',
        ]);
        
        Type::create([
            'code' => 'lim-lim',
            'name' => 'LIF LIM',
            'description' => 'Life Limited',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'nat-req',
            'name' => 'NAT REQ',
            'description' => 'Regulatory Authority Requirement',
            'of'  => 'maintenance-cycle',
        ]);

        Type::create([
            'code' => 'ven-rec',
            'name' => 'VEN REC',
            'description' => 'Vendor Recommendation',
            'of'  => 'maintenance-cycle',
        ]);
    }
}
