<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRPackingAndHandlingCheckType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'reusable-container',
            'name' => 'Reusable Container',
            'of'   => 'rir-packing-handling-type',
        ]);

        Type::create([
            'code' => 'carton',
            'name' => 'Carton Box',
            'of'   => 'rir-packing-handling-type',
        ]);

        Type::create([
            'code' => 'wooden-box',
            'name' => 'Wooden Box',
            'of'   => 'rir-packing-handling-type',
        ]);

        Type::create([
            'code' => 'unpacked',
            'name' => 'Unpacked',
            'of'   => 'rir-packing-handling-type',
        ]);
    }
}
