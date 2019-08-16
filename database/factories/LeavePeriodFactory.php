<?php

use App\Models\LeavePeriod;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

$factory->define(LeavePeriod::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $date = Carbon::create(2019, 5, 28, 0, 0, 0);

    return [
        'code' => $faker->randomElement([null, 'LP-' . $number]),
        'name' => 'Leave ' . $faker->word,
        'period_start' => $date->format('Y-m-d H:i:s'),
        'period_end' =>  $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
