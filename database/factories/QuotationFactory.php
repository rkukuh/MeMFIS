<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Currency;
use App\Models\Quotation;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'number' => 'QTN-' . $number,
        'project_id' => function () {
            if (Project::count()) {
                return Project::get()->random()->id;
            }

            return factory(Project::class)->create()->id;
        },
        'customer_id' => function () {
            if (Customer::count()) {
                return Customer::get()->random()->id;
            }

            return factory(Customer::class)->create()->id;
        },
        'requested_at' => $faker->randomElement([null, Carbon::now()]),
        'valid_until' => $faker->randomElement([null, Carbon::now()]),
        'currency_id' => function () {
            if (Currency::count()) {
                return Currency::get()->random()->id;
            }

            return factory(Currency::class)->create()->id;
        },
        'exchange_rate' => rand(10, 15) * 1000,
        // 'scheduled_payment_type' => function () use ($faker) {
        //     return null;
        // },
        // 'scheduled_payment_amount' => rand(1, 10) * 1000000,
        'total' => rand(10, 100) * 1000000,
        'term_of_condition' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
