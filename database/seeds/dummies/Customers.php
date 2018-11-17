<?php

use App\Models\Fax;
use App\Models\Phone;
use App\Models\Email;
use App\Models\Address;
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

                for ($i = 1; $i <= rand(1, 2); $i++) {
                    $customer
                        ->emails()
                        ->save(factory(Email::class)->make());
                }

                /** Fax */

                for ($i = 1; $i <= rand(1, 2); $i++) {
                    $customer
                        ->faxes()
                        ->save(factory(Fax::class)->make());
                }

                /** Phone */

                for ($i = 1; $i <= rand(1, 2); $i++) {
                    $customer
                        ->phones()
                        ->save(factory(Phone::class)->make());
                }

            });
    }
}
