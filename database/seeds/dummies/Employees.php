<?php

use App\Models\Address;
use App\Models\Document;
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
        factory(Employee::class, config('memfis.examples.employees'))
            ->create()
            ->each(function ($employee) {

                /** Address */

                $employee->addresses()
                         ->saveMany(factory(Address::class, rand(2, 4))->make());

                /** Document */

                $employee->documents()
                         ->saveMany(factory(Document::class, rand(1, 3))->make());

            });
    }
}
