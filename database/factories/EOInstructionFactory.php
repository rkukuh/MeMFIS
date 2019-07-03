<?php

use App\Models\Type;
use App\Models\TaskCard;
use App\Models\EOInstruction;
use Faker\Generator as Faker;

$factory->define(EOInstruction::class, function (Faker $faker) {

    return [
        'taskcard_id' => function () {
            if (TaskCard::count()) {
                return TaskCard::get()->random()->id;
            }

            return factory(TaskCard::class)->states('eo')->create()->id;
        },
        'work_area' => function () {
            if (Type::ofWorkArea()->count()) {
                return Type::ofWorkArea()->get()->random()->id;
            }

            return factory(Type::class)->states('work-area')->create()->id;
        },
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
