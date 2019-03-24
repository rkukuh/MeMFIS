<?php

use App\Models\Storage;
use Faker\Generator as Faker;

$factory->define(Storage::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'STR-DUM-' . $number,
        'name' => 'Storage Dummy #' . $number,
    ];

});
