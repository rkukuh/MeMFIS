<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCard extends Seeder
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
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'check',
            'name' => 'Check',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'visual-check',
            'name' => 'Visual Check',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'service',
            'name' => 'Service',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'repair',
            'name' => 'Repair',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'lubrication',
            'name' => 'Lubrication',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'replacement',
            'name' => 'Replacement',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'overhaul',
            'name' => 'Overhaul',
            'of'  => 'taskcard',
        ]);

        Type::create([
            'code' => 'restore',
            'name' => 'Restore',
            'of'  => 'taskcard',
        ]);
    }
}
