<?php

use App\Models\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'LVL-DUM-' . $number,
        'name' => 'Level Dummy #' . $number,
        'of'   => $faker->randomElement([
            'language',
        ]),
        'score' => $faker->randomDigitNotNull() * 10
    ];

});
