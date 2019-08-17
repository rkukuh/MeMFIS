<?php

use App\Models\Type;
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'COMP-DUM-' . $number]),
        'parent_id' => null,
        'type_id' => $faker->randomElement([null, Type::ofCompany()->get()->random()->id]),
        'name' => $faker->company,
        'maximum_period' => $faker->numberBetween('500000','1000000'),
        'maximum_holiday' => $faker->numberBetween('500000','900000'),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
