<?php

use App\Models\Zone;
use Faker\Generator as Faker;

$factory->define(Zone::class, function (Faker $faker) {

    return [
        'name' => $faker->numerify('###'),
    ];

});
