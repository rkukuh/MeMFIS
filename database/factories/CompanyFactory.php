<?php

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'Company-DUM-' . $number]),
        'name' => $faker->company,
        'parent_id' => null,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
