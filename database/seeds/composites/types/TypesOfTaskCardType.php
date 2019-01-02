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
            'of'  => 'taskcard-type-routine',
        ]);

        Type::create([
            'code' => 'sip',
            'name' => 'Structure Inspection Program',
            'of'  => 'taskcard-type-routine',
        ]);

        Type::create([
            'code' => 'cpcp',
            'name' => 'Corrotion Prevention and Control Programs',
            'of'  => 'taskcard-type-routine',
        ]);

        /** Non-Routine */

        Type::create([
            'code' => 'ad',
            'name' => 'Airworthiness Directive',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'sb',
            'name' => 'Service Bulletin',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'eo',
            'name' => 'Engineering Order',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'ea',
            'name' => 'Engineering Authorization',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'htcrr',
            'name' => 'Hard Time / Component Remove and Replacement',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'si',
            'name' => 'Special Instruction',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'cmr',
            'name' => 'Certification Maintenance Requirements',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'awl',
            'name' => 'Airworthiness Limitation',
            'of'  => 'taskcard-type-non-routine',
        ]);
    }
}
