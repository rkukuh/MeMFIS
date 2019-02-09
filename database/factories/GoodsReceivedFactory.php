<?php

use Carbon\Carbon;
use App\Models\GoodsReceived;
use Faker\Generator as Faker;

$factory->define(GoodsReceived::class, function (Faker $faker) {

    $number  = $faker->unixTime();
    $plate_no = strtoupper($faker->randomLetter) . ' ' . $faker->numberBetween($min = 1000, $max = 9999) . ' ' . strtoupper($faker->randomLetter) . strtoupper($faker->randomLetter);

    return [
        'number' => 'GRN-' . $number,
        'received_at' => $faker->randomElement([null, Carbon::now()]),
        'vehicle_no' => $faker->randomElement([null, $plate_no]),
        'container_no' => $faker->randomElement([null, 'CON-' . $faker->numberBetween($min = 1000, $max = 9999)]),
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
