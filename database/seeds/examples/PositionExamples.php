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
            'name' => 'Staff',
        ]);

        Position::create([
            'code' => strtolower('STF001'),
            'name' => 'Staff',
        ]);

        Role::create([
            'name' => 'Supervisor',
        ]);

        Position::create([
            'code' => strtolower('SPV01'),
            'name' => 'Supervisor',
        ]);

        Role::create([
            'name' => 'Manager',
        ]);

        Position::create([
            'code' => strtolower('MGR01'),
            'name' => 'Manager',
        ]);

        Role::create([
            'name' => 'General Manager',
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
