<?php

use App\Models\Type;
use App\Models\Version;
use App\Models\TaskCard;
use App\Models\Description;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    $number  = $faker->unixTime();
    $version = rand(1, 9).'.'.rand(1, 9);

    return [
        'number' => $number,
        'title' => 'TaskCard Dummy #' . $number,
        'type_id' => $faker->randomElement([
            Type::ofTaskCardTypeRoutine()->get()->random()->id,
            Type::ofTaskCardTypeNonRoutine()->get()->random()->id,
        ]),
        'task_type_id' => Type::ofTaskCardTask()->get()->random()->id,
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'manhour' => $faker->randomFloat,
        'helper_quantity' => $faker->randomElement(null, rand(1, 10)),
        'is_rii' => $faker->boolean,
        'source' => null,
        'version' => $faker->randomElement([null, $version]),
        'effectivity' => null,
        'description' => $faker->paragraph(rand(10, 20)),
        'version' => null,

        // 'otr_certification_id' => null,  // TODO: Refactor its entity name
    ];

});

/** States */

// TODO: Define states for: Basic, EO, and SI

/** Callbacks */

$factory->afterCreating(TaskCard::class, function ($taskcard, $faker) {
    if ($faker->boolean) {
        $taskcard->versions()->saveMany(factory(Version::class, rand(2, 4))->make());
    }

    // TODO: Save Many (1, 3) the aircraft_taskcard
    // TODO: Save the aircraft access
    // TODO: Save the aircraft zones
});
