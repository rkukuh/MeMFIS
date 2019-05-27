<?php

use App\Models\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {

    return [
        'amount' => rand(10, 100) * 1000000,
        'level' => rand(1, 10),
    ];

});
