<?php

use App\Models\Type;
use App\Models\Version;
use App\Models\TaskCard;
use App\Models\Description;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => $number,
        'title' => 'TaskCard Dummy #' . $number,
        'type_id' => Type::ofTaskCard()->get()->random()->id,
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'zone' => 'Zone Dummy #' . $faker->unixTime(),
        'access' => 'Access Dummy #' . $faker->unixTime(),
        'is_rii' => $faker->boolean,
        'is_applicability_engine_all' => $faker->boolean,
        'source' => null,
        'effectivity' => null,
        'description' => $faker->paragraph(rand(10, 20))

        // 'otr_certification_id' => null,  // TODO: Refactor its entity name
        // 'applicability_aircraft' => '',  // TODO: Refactor to M-M polymorph
        // 'applicability_engine' => '',    // TODO: Refactor to M-M polymorph
    ];

});

/** Callbacks */

$factory->afterCreating(TaskCard::class, function ($employee, $faker) {
    if ($faker->boolean) {
        $employee->versions()->saveMany(factory(Version::class, rand(2, 4))->make());
    }
});
