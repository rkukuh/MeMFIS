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
            'name' => 'AD',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'sb',
            'name' => 'SB',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'eo',
            'name' => 'EO',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'ea',
            'name' => 'EA',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'htcrr',
            'name' => 'HT/CRR',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'si',
            'name' => 'SI',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'cmr',
            'name' => 'CMR',
            'of'  => 'taskcard-type-non-routine',
        ]);

        Type::create([
            'code' => 'awl',
            'name' => 'AWL',
            'of'  => 'taskcard-type-non-routine',
        ]);
    }
}
