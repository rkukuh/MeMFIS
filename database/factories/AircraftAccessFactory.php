<?php

use App\Models\Aircraft;
use App\Models\AircraftAccess;
use Faker\Generator as Faker;

$factory->define(AircraftAccess::class, function (Faker $faker) {

    return [
        'name' => $faker->numerify('###'),
        'aircraft_id' => Aircraft::get()->random()->id,
    ];

});
