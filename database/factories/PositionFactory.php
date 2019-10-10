<?php

use App\Models\Benefit;
use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'POS-DUM-' . $number]),
        'name' => 'Position ' . $faker->word,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(Position::class, function ($position, $faker) {

    // Benefit

    for ($i = 0; $i < rand(1, 4); $i++) {
        $position->benefits()->save(Benefit::get()->random(), [
            'min' => rand(100, 500) * 1000,
            'max' => rand(600, 1000) * 1000,
            'updated_at' => null,
        ]);
    }

});
