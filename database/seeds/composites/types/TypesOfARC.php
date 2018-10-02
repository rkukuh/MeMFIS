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
            'name' => 'Tested',
            'of'   => 'arc',
        ]);

        Type::create([
            'name' => 'Inspected',
            'of'   => 'arc',
        ]);

        Type::create([
            'name' => 'Repaired',
            'of'   => 'arc',
        ]);

        Type::create([
            'name' => 'Overhauled',
            'of'   => 'arc',
        ]);
    }
}
