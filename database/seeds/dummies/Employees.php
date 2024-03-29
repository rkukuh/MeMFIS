<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class Employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, config('memfis.dummies.employees'))->create();
    }
}
