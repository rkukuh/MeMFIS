<?php

use Carbon\Carbon;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {

    $firstNameMale = $faker->firstNameMale();
    $firstNameFemale = $faker->firstNameFemale();
    $lastname = $faker->lastName();

    return [
        'code' => 'NRP-' . $faker->unixTime(),
        'first_name' => $faker->randomElement([$firstNameMale, $firstNameFemale]),
        'middle_name' => $faker->randomElement([null, $faker->lastName()]),
        'last_name' => $lastname,
        'dob' => Carbon::now()->subYear(rand(20, 50)),
        'gender' => $faker->randomElement(['m', 'f']),
        'hired_at' => Carbon::now()->subYear(rand(1, 10))
    ];

});
