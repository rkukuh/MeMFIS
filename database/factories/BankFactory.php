<?php

use App\Models\Bank;
use Faker\Generator as Faker;

$factory->define(Bank::class, function (Faker $faker) {

    $faker = \Faker\Factory::create('en_US');

    $bank_name = $faker->company;

    return [
        'abbr' => strtoupper(substr($bank_name, 0, 4)),
        'name' => 'Bank ' . $bank_name,
    ];

});
