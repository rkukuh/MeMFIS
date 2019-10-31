<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRMaterialCheckCondition extends Seeder
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
            'name' => 'Unsatisfactory',
            'of'   => 'rir-material-condition',
        ]);

        Type::create([
            'code' => 'unsatisfactory',
            'name' => 'Unsatisfactory',
            'of'   => 'rir-material-condition',
        ]);
    }
}
