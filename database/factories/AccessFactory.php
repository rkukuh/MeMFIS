<?php

use App\Models\Access;
use Faker\Generator as Faker;

$factory->define(Access::class, function (Faker $faker) {

    return [
        'name' => $faker->numerify('###'),
    ];

});
