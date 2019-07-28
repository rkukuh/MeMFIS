<?php

use App\Models\Type;
use App\Models\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'DEPT-DUM-' . $number]),
        'parent_id' => null,
        'type_id' => $faker->randomElement([null, Type::ofDepartment()->get()->random()->id]),
        'name' => 'Dept. ' . $faker->word,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
