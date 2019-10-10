<?php

use App\Models\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\ms_MY\Payment($faker));

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BANK-DUM-' . $number]),
        'name' => $faker->bank,
    ];

});
