<?php

use App\Models\Manhour;
use Faker\Generator as Faker;

$factory->define(Manhour::class, function (Faker $faker) {

    return [
        'rate' => rand(10, 100) * 1000000,
        'level' => rand(1, 10),
    ];

});
