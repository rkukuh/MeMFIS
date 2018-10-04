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
            'code' => 'inspection',
            'name' => 'Inspection',
            'of'   => 'capability',
        ]);

        Type::create([
            'code' => 'check-test',
            'name' => 'Check and Test',
            'of'   => 'capability',
        ]);

        Type::create([
            'code' => 'repair',
            'name' => 'Repair',
            'of'   => 'capability',
        ]);

        Type::create([
            'code' => 'overhaul',
            'name' => 'Overhaul',
            'of'   => 'capability',
        ]);
    }
}
