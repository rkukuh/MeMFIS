<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRPreservationCheck extends Seeder
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
            'of'   => 'rir-preservation-check',
        ]);

        Type::create([
            'code' => 'wooden-box',
            'name' => 'Wooden Box',
            'of'   => 'rir-preservation-check',
        ]);
    }
}
