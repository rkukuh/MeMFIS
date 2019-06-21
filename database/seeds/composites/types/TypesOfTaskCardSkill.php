<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCardSkill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'airframe',
            'name' => 'Airframe',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'powerplant',
            'name' => 'Powerplant / Engine',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'electrical',
            'name' => 'Electrical',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'radio',
            'name' => 'Radio',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'instrument',
            'name' => 'Instrument',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'cabin',
            'name' => 'Cabin Maintenance',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'runup',
            'name' => 'Run-Up',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'repair',
            'name' => 'Repair',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'repainting',
            'name' => 'Repainting',
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'ndi-ndt',
            'name' => 'NDI / NDT', // Non Destructive Test / Non Destructive Inspection
            'of'   => 'taskcard-skill',
        ]);

        Type::create([
            'code' => 'eri',
            'name' => 'ERI', // Electrical, Radio, & Instrument
            'of'   => 'taskcard-skill',
        ]);
    }
}
