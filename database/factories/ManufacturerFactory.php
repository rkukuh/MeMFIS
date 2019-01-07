<?php

use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Manufacturer::class, function (Faker $faker) {

    $name = 'Manufacturer Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
    ];

});
