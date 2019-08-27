<?php

use App\Models\Approval;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Approval::class, function (Faker $faker) {

    return [
        'is_approved' => $faker->boolean,
        'conducted_by' => Employee::get()->random()->id,
        'note' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
