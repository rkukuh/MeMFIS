<?php

use App\Models\Fax;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Address;
use App\Models\Website;
use App\Models\Customer;
use App\Models\Document;
use Illuminate\Database\Seeder;

class Customers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, config('memfis.examples.customers'))
            ->create()
            ->each(function ($customer) {

                /** Address */

                $customer->addresses()
                         ->saveMany(factory(Address::class, rand(2, 4))->make());

                /** Document */

                $customer->documents()
                         ->saveMany(factory(Document::class, rand(1, 3))->make());

                /** Email */

                $customer->emails()
                         ->saveMany(factory(Email::class, rand(1, 2))->make());

                /** Fax */

                $customer->faxes()
                         ->saveMany(factory(Fax::class, rand(1, 2))->make());

                /** Phone */

                $customer->phones()
                         ->saveMany(factory(Phone::class, rand(1, 2))->make());

                /** Website */

                $customer->websites()
                         ->saveMany(factory(Website::class, rand(2, 4))->make());
            });
    }
}
