<?php

use App\Models\JobTittle;
use Faker\Generator as Faker;

$factory->define(JobTittle::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'BPJS-' . $number]),
        'name' => 'Bpjs ' . $faker->word,
        'description' => $faker->text(),
        'specification' => $faker->text()
    ];

});
