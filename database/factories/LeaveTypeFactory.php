<?php

use App\Models\LeaveType;
use Faker\Generator as Faker;

$factory->define(LeaveType::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'LTYPE-' . $number]),
        'name' => 'Leave Type' . $faker->word,
        'gender' => $faker->randomElement(['all','m','f']),
        'based' => $faker->randomElement(['multi','daily',null]),
        'leave_period' => $faker->numberBetween(1,10),
        'prorate_leave' =>  $faker->boolean(),
        'distribute_evently' =>  $faker->boolean(),
        'back_date' =>  $faker->boolean(),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
