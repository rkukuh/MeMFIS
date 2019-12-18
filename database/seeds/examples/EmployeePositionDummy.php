<?php

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Seeder;

class EmployeePositionDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = Employee::get();

        foreach($employees as $employee){
            $employee->update(['position_id' => $position = Position::get()->random()->id]);
        }


    }
}
