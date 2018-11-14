<?php

use App\Models\Address;
use App\Models\Customer;
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

                for ($i = 1; $i <= rand(2, 4); $i++) {
                    $address = factory(Address::class)->make();

                    $customer->addresses()->save($address);
                }

            });
    }
}
