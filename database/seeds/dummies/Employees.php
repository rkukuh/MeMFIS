<?php

use App\Models\Fax;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Address;
use App\Models\Website;
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

                /** Email */

                $employee->emails()
                         ->saveMany(factory(Email::class, rand(1, 2))->make());

                /** Fax */

                $employee->faxes()
                         ->saveMany(factory(Fax::class, rand(1, 2))->make());

                /** Phone */

                $employee->phones()
                         ->saveMany(factory(Phone::class, rand(1, 2))->make());

                /** Website */

                $employee->websites()
                         ->saveMany(factory(Website::class, rand(2, 4))->make());
            });
    }
}
