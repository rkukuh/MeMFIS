<?php

use App\Models\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {

    $name = 'Vendor Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
    ];

});
