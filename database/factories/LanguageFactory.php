<?php

use App\Models\Language;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {

    return [
        'name' => $faker->country,
        'iso_639_1' => $faker->languageCode,
        'iso_639_2' => strtolower($faker->currencyCode),
    ];

});
