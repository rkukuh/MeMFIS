<?php

use App\Models\Project;
use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    $code  = $faker->unixTime();

    return [
        'code' => 'PRJ-' . $code,
        'title' => 'Project Dummy #' . $code,
        'customer_id' => function () {
            if (Customer::count()) {
                return Customer::get()->random()->id;
            }

            return factory(Customer::class)->create()->id;
        },
        'no_wo' => 'WO-' . $faker->randomNumber(),
        'aircraft_register' => 'AC-REG-' . $faker->randomNumber(),
        'aircraft_sn' => 'AC-SN-' . $faker->randomNumber(),
    ];

});
