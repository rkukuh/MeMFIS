<?php

use App\Models\Type;
use App\Models\Status;
use App\Models\Progress;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Progress::class, function (Faker $faker) {

    return [
        'status_id' => Status::get()->random()->id,
        'reason_id' => Type::ofJobCardCloseReason()->get()->random()->id,
        'reason_text' => $faker->randomElement([null, $faker->sentence]),
        'progressed_by' => Employee::get()->random()->id,
        'note' => $faker->randomElement([null, $faker->text]),
    ];

});
