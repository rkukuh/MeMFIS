<?php

use App\Models\TimeOffPeriod;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(TimeOffPeriod::class, function (Faker $faker) {
    $number = $faker->unixTime();
    $date = Carbon::create(2015, 5, 28, 0, 0, 0);

    return [
        'code' => $faker->randomElement([null, 'BENF-DUM-' . $number]),
        'name' => 'leave' . $faker->word,
        'period_start' =>  $date->format('Y-m-d'),
        'period_end' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
