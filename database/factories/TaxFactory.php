<?php

use App\Models\Tax;
use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Tax::class, function (Faker $faker) {

    return [
        'taxable_type' => null,
        'taxable_id' => null,
        'type_id' => Type::ofTax()->get()->random()->id,
        'percent' => $faker->randomElement([5, 10, 15, 20]),
        'amount' => rand(10, 20) * 10000,
    ];

});
