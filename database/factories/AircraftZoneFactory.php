<?php

use App\Models\Aircraft;
use App\Models\AircraftZone;
use Faker\Generator as Faker;

$factory->define(AircraftZone::class, function (Faker $faker) {

    return [
        'name' => $faker->numerify('###'),
        'aircraft_id' => Aircraft::get()->random()->id,
    ];

});
