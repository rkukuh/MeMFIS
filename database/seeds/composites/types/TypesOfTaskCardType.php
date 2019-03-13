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
            'name' => 'SIP',
            'of'  => 'taskcard-type-routine',
        ]);

        Type::create([
            'code' => 'cpcp',
            'name' => 'CPCP',
            'of'  => 'taskcard-type-routine',
        ]);

        /** Non-Routine */

        Type::create([
            'code' => 'ad',
            'name' => 'Air Worthiness Directive',
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
            'name' => 'HT/CRR',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'si',
            'name' => 'Special Instruction',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'cmr',
            'name' => 'Certification Maintenance Requirement',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'awl',
            'name' => 'Airworthiness Limitations',
            'of'  => 'taskcard-type-non-routine',
        ]);
    }
}
