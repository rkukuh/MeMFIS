<?php

use App\Models\Type;
use App\Models\LeaveType;
use Faker\Generator as Faker;

$factory->define(LeaveType::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'LTYPE-' . $number]),
        'name' => 'Leave Type' . $faker->word,
        'gender_id' => Type::ofGender()->where('code', $faker->randomElement(['all','male','female']))->first()->id,            
        'type_id' => Type::ofLeaveType()->where('code', $faker->randomElement(['multi-day','daily']))->first()->id,
        'leave_period' => $faker->numberBetween(1,10),
        'prorate_leave' =>  $faker->boolean,
        'distribute_evently' =>  $faker->boolean,
        'back_date' =>  $faker->boolean,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
