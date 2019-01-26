<?php

use App\Models\Type;
use App\Models\EOInstruction;
use Faker\Generator as Faker;

$factory->define(EOInstruction::class, function (Faker $faker) {

    return [
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'manhour' => $faker->randomFloat(2, 0, 9999),
        'helper_quantity' => $faker->randomElement([null, rand(1, 10)]),
        'is_rii' => $faker->boolean,
        'performance_factor' => $faker->randomElement([
            null,
            rand(0, 10) / 10 // min:0-max:1-step:0,1
        ]),
        'sequence' => $faker->randomElement([null, rand(1, 10)]),
        'description' => $faker->paragraph(rand(10, 20)),
        'note' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
