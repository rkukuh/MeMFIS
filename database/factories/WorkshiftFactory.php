<?php

use App\Models\Workshift;
use Faker\Generator as Faker;

$factory->define(Workshift::class, function (Faker $faker) {
    $number = $faker->unixTime();
    
    return [
        'code' => $faker->randomElement([null, 'WORK-' . $number]),
        'name' => 'Shift ' . $faker->word,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
