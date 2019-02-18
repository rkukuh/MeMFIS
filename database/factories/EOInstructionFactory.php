<?php

use App\Models\Type;
use App\Models\EOInstruction;
use Faker\Generator as Faker;

$factory->define(EOInstruction::class, function (Faker $faker) {

    return [
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'engineer_quantity' => rand(1, 10),
        'helper_quantity' => $faker->randomElement([null, rand(1, 5)]),
        'is_rii' => $faker->boolean,
        'performance_factor' => $faker->randomElement([
            null,
            (float)(rand(1, 5) * 0.5) // min:1-max:unlimited-step:0,1-eg:1;1,5;2;
        ]),
        'sequence' => $faker->randomElement([null, rand(1, 10)]),
        'description' => $faker->paragraph(rand(10, 20)),
        'note' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
