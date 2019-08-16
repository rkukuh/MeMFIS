<?php

use App\Models\BPJS;
use Faker\Generator as Faker;

$factory->define(BPJS::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BPJS-' . $number]),
        'name' => 'Bpjs ' . $faker->word,
        'employee_paid' => $faker->numberBetween(0,100),
        'employee_min_value' => $faker->numberBetween(500000,1000000),
        'employee_max_value' => $faker->numberBetween(1000000,1500000),
        'company_paid' => $faker->numberBetween(0,100),
        'company_min_value' => $faker->numberBetween(500000,1000000),
        'company_max_value' => $faker->numberBetween(1000000,1500000),
    ];

});
