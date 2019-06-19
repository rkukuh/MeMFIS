<?php

use Carbon\Carbon;
use App\Models\Version;
use Faker\Generator as Faker;

$factory->define(Version::class, function (Faker $faker) {

    return [
        'number' => $faker->randomElement(['1.', '2.']) . $faker->randomDigitNotNull,
        'change_log' => $faker->randomElement([null, $faker->paragraph]),
        'versioned_at' => $faker->randomElement([
            null,
            Carbon::now()->addDay(rand(10, 20))
        ]),
    ];

});
