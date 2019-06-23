<?php

use App\Models\Price;
use App\Models\Facility;
use Faker\Generator as Faker;

$factory->define(Facility::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'FAC-DUM-' . $number,
        'name' => 'Facility Dummy #' . $number,
    ];

});

/** CALLBACKS */

$factory->afterCreating(Facility::class, function ($facility, $faker) {

    // Price

    $facility->prices()->saveMany(
        factory(Price::class, rand(3, 6))->make(['level' => 0])
    );

});
