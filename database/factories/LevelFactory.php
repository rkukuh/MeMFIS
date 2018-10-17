<?php

use App\Models\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {

    $name = 'Level Example #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'of'   => $faker->randomElement([
            'language',
        ]),
        'score' => $faker->randomDigitNotNull() * 10
    ];

});
