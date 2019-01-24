<?php

use App\Models\WorkPackage;
use Faker\Generator as Faker;

$factory->define(WorkPackage::class, function (Faker $faker) {

    $code  = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'WP-' . $code]),
        'title' => 'WorkPackage Dummy #' . $code,
        'is_template' => $faker->boolean(),
        'description' => $faker->randomElement([null, $faker->text(rand(100, 500) * 10)]),
    ];

});
