<?php

use App\Models\RTS;
use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(RTS::class, function (Faker $faker) {

    return [
        'project_id' => function () {
            if (Project::count()) {
                return Project::get()->random()->id;
            }

            return factory(Project::class)->create()->id;
        },
        'work_performed' => $faker->randomElement([null, $faker->text]),
        'work_data' => $faker->randomElement([null, $faker->text]),
        'exception' => $faker->randomElement([null, $faker->text]),
    ];

});
