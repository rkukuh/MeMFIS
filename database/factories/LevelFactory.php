<?php

use App\Models\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'LVL-DUM-' . $number,
        'name' => 'Level Dummy #' . $number,
        'of'   => $faker->randomElement([
            'customer',
            'language',
            'otr',
        ]),
        'score' => $faker->randomDigitNotNull() * 10
    ];

});

$factory->state(Type::class, 'customer', ['of' => 'customer']);
$factory->state(Type::class, 'language', ['of' => 'language']);
$factory->state(Type::class, 'otr', ['of' => 'otr']);
