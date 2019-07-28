<?php

use App\Models\Type;
use App\Models\Benefit;
use Faker\Generator as Faker;

$factory->define(Benefit::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BENF-DUM-' . $number]),
        'name' => 'Benefit ' . $faker->word,
        'base_calculation' => Type::ofBenefitBaseCalculation()->get()->random()->id,
        'prorate_calculation' => Type::ofBenefitProrateCalculation()->get()->random()->id,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
