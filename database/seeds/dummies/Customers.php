<?php

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

                /** Document */

                for ($i = 1; $i <= rand(1, 3); $i++) {
                    $customer
                        ->documents()
                        ->save(factory(Document::class)->make());
                }

                /** Address */

                for ($i = 1; $i <= rand(2, 4); $i++) {
                    $customer
                        ->addresses()
                        ->save(factory(Address::class)->make());
                }

            });
    }
}
