<?php

use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'POS-DUM-' . $number]),
        'name' => 'Position ' . $faker->word,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
