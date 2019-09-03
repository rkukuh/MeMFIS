<?php

use App\Models\Branch;
use App\Models\Company;
use App\Models\BankAccount;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BRCH-DUM-' . $number]),
        'name' => $faker->city,
        'company_id' => function () {
            if (Company::count()) {
                return Company::get()->random()->id;
            }

            return factory(Company::class)->create()->id;
        },
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** Callbacks */

$factory->afterCreating(Branch::class, function ($branch, $faker) {

    // Bank Account
    
    if ($faker->boolean) {
        $branch->bank_accounts()->saveMany(factory(BankAccount::class, rand(1, 3))->make());
    }

});
