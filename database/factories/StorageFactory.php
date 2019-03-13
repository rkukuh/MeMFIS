<?php

use App\Models\Storage;
use Faker\Generator as Faker;

$factory->define(Storage::class, function (Faker $faker) {

    $name = 'Storage Dummy #' . $faker->unixTime();

    return [
        'code' => str_slug($name),
        'name' => $name,
    ];

});
