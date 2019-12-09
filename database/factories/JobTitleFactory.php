<?php

use App\Models\JobTitle;
use Faker\Generator as Faker;

$factory->define(JobTitle::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'JOB-' . $number]),
        'name' => 'Job ' . $faker->word,
        'description' => $faker->text(),
        'specification' => $faker->text()
    ];

});
