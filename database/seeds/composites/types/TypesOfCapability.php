<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfCapability extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Inspection',
            'of'   => 'capability',
        ]);

        Type::create([
            'name' => 'Check and Test',
            'of'   => 'capability',
        ]);

        Type::create([
            'name' => 'Repair',
            'of'   => 'capability',
        ]);

        Type::create([
            'name' => 'Overhaul',
            'of'   => 'capability',
        ]);
    }
}
