<?php

use App\Models\Employee;
use App\Models\Inspection;
use Faker\Generator as Faker;

$factory->define(Inspection::class, function (Faker $faker) {

    return [
        'inspected_by' => Employee::get()->random()->id,
        'is_rii' => $faker->boolean,
        'note' => $faker->randomElement([null, $faker->text]),
    ];

});
