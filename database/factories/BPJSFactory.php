<?php

use App\Models\BPJS;
use App\Models\BpjsHistory;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

$factory->define(BPJS::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $date = Carbon::create(2019, 5, 28, 0, 0, 0);

    return [
        'code' => $faker->randomElement([null, 'BPJS-' . $number]),
        'name' => 'Bpjs ' . $faker->word,
        'employee_paid' => $faker->numberBetween(0,100),
        'employee_min_value' => $faker->numberBetween(500000,1000000),
        'employee_max_value' => $faker->numberBetween(1000000,1500000),
        'company_paid' => $faker->numberBetween(0,100),
        'company_min_value' => $faker->numberBetween(500000,1000000),
        'company_max_value' => $faker->numberBetween(1000000,1500000),
        'created_at' => $date->format('Y-m-d H:i:s')
    ];

});
