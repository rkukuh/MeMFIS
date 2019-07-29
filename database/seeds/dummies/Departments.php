<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class Departments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Department::class, config('memfis.dummies.departments'))->create();
    }
}
