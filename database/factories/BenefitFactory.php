<?php

use App\Models\Type;
use App\Models\Benefit;
use Faker\Generator as Faker;

$factory->define(Benefit::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BENF-DUM-' . $number]),
        'name' => 'Benefit ' . $faker->word,
        'base_calculation' => null,
        'prorate_calculation' => null,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
