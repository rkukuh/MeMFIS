<?php

use App\Models\Bank;
use App\Models\BankAccount;
use Faker\Generator as Faker;

$factory->define(BankAccount::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'number' => $faker->numerify('### ##### ####'),
        'bank_id' => Bank::get()->random()->id,
    ];

});
