<?php

use App\Models\Station;
use Faker\Generator as Faker;

$factory->define(Station::class, function (Faker $faker) {

    return [
        'name' => $faker->numerify('###'),
    ];

});
