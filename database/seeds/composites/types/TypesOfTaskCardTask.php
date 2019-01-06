<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCardTask extends Seeder
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
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'check',
            'name' => 'Check',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'visual-check',
            'name' => 'Visual Check',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'service',
            'name' => 'Service',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'repair',
            'name' => 'Repair',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'lubrication',
            'name' => 'Lubrication',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'replacement',
            'name' => 'Replacement',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'overhaul',
            'name' => 'Overhaul',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'restore',
            'name' => 'Restore',
            'of'  => 'taskcard-task',
        ]);
    }
}
