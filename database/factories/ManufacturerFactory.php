<?php

use App\Models\Manufacturer;
use Faker\Generator as Faker;

$factory->define(Manufacturer::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'MAN-DUM-' . $number,
        'name' => 'Manufacturer Dummy #' . $number,
    ];

});
