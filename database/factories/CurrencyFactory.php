<?php

use App\Models\Currency;
use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'CUR-DUM-' . $number,
        'name' => 'Currency Dummy #' . $number,
        'symbol' => 'CUD',
    ];

});
