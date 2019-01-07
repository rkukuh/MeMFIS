<?php

use App\Models\Aircraft;
use Faker\Generator as Faker;

$factory->define(Aircraft::class, function (Faker $faker) {

    $name = 'Aircraft Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
        'manufacturer_id' => null,
    ];

});
