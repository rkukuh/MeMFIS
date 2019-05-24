<?php

use App\Models\Facility;
use Faker\Generator as Faker;

$factory->define(Facility::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'FAC-DUM-' . $number,
        'name' => 'Facility Dummy #' . $number,
    ];

});
