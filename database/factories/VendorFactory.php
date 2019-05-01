<?php

use App\Models\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'VEN-DUM-' . $number,
        'name' => 'Vendor Dummy #' . $number,
    ];

});
