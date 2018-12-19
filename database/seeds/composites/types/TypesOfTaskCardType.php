<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCardType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Routine */

        Type::create([
            'code' => 'basic',
            'name' => 'Basic',
            'of'  => 'taskcard-type',
        ]);

        Type::create([
            'code' => 'sip',
            'name' => 'Structure Inspection Program',
            'of'  => 'taskcard-type',
        ]);

        Type::create([
            'code' => 'cpcp',
            'name' => 'Corrotion Prevention and Control Programs',
            'of'  => 'taskcard-type',
        ]);

        /** Non-Routine */

        Type::create([
            'code' => 'adsb',
            'name' => 'Airworthiness Directive and Service Bulletin',
            'of'  => 'taskcard-type',
        ]);

        Type::create([
            'code' => 'eo',
            'name' => 'Engineering Order',
            'of'  => 'taskcard-type',
        ]);

        Type::create([
            'code' => 'ea',
            'name' => 'Engineering Authorization',
            'of'  => 'taskcard-type',
        ]);

        Type::create([
            'code' => 'htcrr',
            'name' => 'Hard Time / Component Remove and Replacement',
            'of'  => 'taskcard-type',
        ]);

        Type::create([
            'code' => 'si',
            'name' => 'Special Instruction',
            'of'  => 'taskcard-type',
        ]);
    }
}
