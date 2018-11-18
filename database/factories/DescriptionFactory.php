<?php

use App\Models\Description;
use Faker\Generator as Faker;

$factory->define(Description::class, function (Faker $faker) {

    return [
        'body' => $faker->text,
    ];

});
