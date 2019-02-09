<?php

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'code' => 'SUP-' . $number,
    ];

});
