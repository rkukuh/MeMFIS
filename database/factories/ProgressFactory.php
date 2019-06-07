<?php

use App\Models\Status;
use App\Models\Progress;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Progress::class, function (Faker $faker) {

    return [
        'status_id' => Status::get()->random()->id,
        'progressed_by' => Employee::get()->random()->id,
        'note' => $faker->randomElement([null, $faker->text]),
    ];

});
