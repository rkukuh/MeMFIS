<?php

use App\Models\Type;
use App\Models\JobCard;
use App\Models\DefectCard;
use Faker\Generator as Faker;

$factory->define(DefectCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'DC-DUM-' . $number,
        'jobcard_id' => JobCard::get()->random()->id,
        'engineer_quantity' => rand(1, 10),
        'helper_quantity' => rand(10, 100),
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'is_rii' => $faker->boolean,
        'propose_correction_id' => Type::ofDefectCardProposeCorrection()->get()->random()->id,
        'propose_correction_other' => null,
        'complaint' => $faker->randomElement([null, $faker->text]),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
