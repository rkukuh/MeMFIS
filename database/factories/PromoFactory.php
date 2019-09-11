<?php

use App\Models\Promo;
use Faker\Generator as Faker;

$factory->define(Promo::class, function (Faker $faker) {

    return [
        'code' => strtoupper($faker->word),
        'name' => ucwords($faker->sentence),
    ];

});
