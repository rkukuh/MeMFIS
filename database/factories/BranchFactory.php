<?php

use App\Models\Branch;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BRCH-DUM-' . $number]),
        'name' => $faker->city,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
