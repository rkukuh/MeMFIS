<?php

use App\Models\Position;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class PositionExamples extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** dummy position examples for trial */
        Role::create([
            'name' => 'staff',
        ]);

        Position::create([
            'code' => strtolower('STF001'),
            'name' => 'Staff',
        ]);

        Role::create([
            'name' => 'supervisor',
        ]);

        Position::create([
            'code' => strtolower('SPV01'),
            'name' => 'Supervisor',
        ]);

        Role::create([
            'name' => 'manager',
        ]);

        Position::create([
            'code' => strtolower('MGR01'),
            'name' => 'Manager',
        ]);

        Role::create([
            'name' => 'manager-production',
        ]);

        Position::create([
            'code' => strtolower('MGR02'),
            'name' => 'Manager',
        ]);

        Role::create([
            'name' => 'manager-marketing',
        ]);

        Position::create([
            'code' => strtolower('MGR03'),
            'name' => 'Manager',
        ]);

        Role::create([
            'name' => 'general-manager',
        ]);

        Position::create([
            'code' => strtolower('GM01'),
            'name' => 'General Manager',
        ]);

        Role::create([
            'name' => 'CEO',
        ]);

        Position::create([
            'code' => strtolower('CEO'),
            'name' => 'CEO',
        ]);
        
    }
}
