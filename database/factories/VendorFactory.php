<?php

use App\Models\Vendor;
use App\Models\BankAccount;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'VEN-DUM-' . $number,
        'name' => 'Vendor Dummy #' . $number,
    ];

});

/** Callbacks */

$factory->afterCreating(Vendor::class, function ($vendor, $faker) {

    // Bank Account
    
    if ($faker->boolean) {
        $vendor->bank_accounts()->saveMany(factory(BankAccount::class, rand(1, 3))->make());
    }

});
