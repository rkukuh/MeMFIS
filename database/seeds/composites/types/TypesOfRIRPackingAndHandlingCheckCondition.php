<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRPackingAndHandlingCheckCondition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'satisfactory',
            'name' => 'Satisfactory',
            'of'   => 'rir-packing-handling-condition',
        ]);

        Type::create([
            'code' => 'unsatisfactory',
            'name' => 'Unsatisfactory',
            'of'   => 'rir-packing-handling-condition',
        ]);
    }
}
