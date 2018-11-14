<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Journal;
use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

    $name = 'Customer Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'payment_term' => $faker->randomElement([
            null,
            Type::ofPaymentTerm()->get()->random()->id
        ]),
        'banned_at' => $faker->randomElement([
            null,
            Carbon::now()
        ]),
        'account_code' => $faker->randomElement([
            null,
            Journal::get()->random()->id
        ])
    ];

});
