<?php

use App\Models\Zone;
use Faker\Generator as Faker;

$factory->define(Zone::class, function (Faker $faker) {

    return [
        'name' => $faker->numerify('###'),
        'description' => $faker->paragraph(rand(10, 20)),
    ];

});
