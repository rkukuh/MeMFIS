<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfARC extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'tested',
            'name' => 'Tested',
            'of'   => 'arc',
        ]);

        Type::create([
            'code' => 'inspected',
            'name' => 'Inspected',
            'of'   => 'arc',
        ]);

        Type::create([
            'code' => 'repaired',
            'name' => 'Repaired',
            'of'   => 'arc',
        ]);

        Type::create([
            'code' => 'overhauled',
            'name' => 'Overhauled',
            'of'   => 'arc',
        ]);
    }
}
