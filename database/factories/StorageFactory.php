<?php

use App\Models\Storage;
use Faker\Generator as Faker;

$factory->define(Storage::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'ST-DUM-' . $sequence,
        'name' => 'Storage Dummy #' . $sequence,
    ];

});
