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

        Type::create([
            'code' => 'functional',
            'name' => 'Functional',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'borescope',
            'name' => 'Borescope',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'detailed-instruction',
            'name' => 'Detailed Instruction',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'general-visual',
            'name' => 'General Visual',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'general-visual-inspection',
            'name' => 'General Visual Inspection',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'visual-inspection',
            'name' => 'Visual Inspection',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'operational',
            'name' => 'Operational',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'rs',
            'name' => 'RS',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'sv',
            'name' => 'SV',
            'of'  => 'taskcard-task',
        ]);

        Type::create([
            'code' => 'discard',
            'name' => 'DISCARD',
            'of'  => 'taskcard-task',
        ]);

    }
}
