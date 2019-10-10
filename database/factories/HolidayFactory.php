<?php

use App\Models\Holiday;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

$factory->define(Holiday::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $date = Carbon::create(2019, 7, 28, 0, 0, 0);

    return [
        'code' => $faker->randomElement([null, 'LIBLUR-' . $number]),
        'name' => 'Holiday ' . $faker->word,
        'start_date' => $date->format('Y-m-d H:i:s'),
        'end_date' =>  $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
