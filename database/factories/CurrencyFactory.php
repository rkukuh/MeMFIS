<?php

use App\Models\Currency;
use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {

    $name = 'Currency Dummy #' . $faker->unixTime();

    return [
        'code'   => str_slug($name),
        'name'   => $name,
        'symbol' => 'CUD',
    ];

});
