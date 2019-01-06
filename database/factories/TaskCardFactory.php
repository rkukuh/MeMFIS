<?php

use App\Models\Type;
use App\Models\Access;
use App\Models\Version;
use App\Models\TaskCard;
use App\Models\Aircraft;
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
        'manhour' => $faker->randomFloat(2, 0, 9999),
        'helper_quantity' => $faker->randomElement(null, rand(1, 10)),
        'is_rii' => $faker->boolean,
        'source' => null,
        'version' => $faker->randomElement([null, $version]),
        'effectivity' => null,
        'description' => $faker->paragraph(rand(10, 20)),
        'version' => null,
        'performance_factor' => rand(0, 10) / 10, // 0-1

        // 'otr_certification_id' => null,  // TODO: Refactor its entity name
    ];

});

/** STATES */

$factory->state(TaskCard::class, 'basic', function ($faker) {

    return [
        'type_id' => Type::ofTaskCardTypeRoutine()->get()->random()->id,
    ];

});

$factory->state(TaskCard::class, 'eo', function ($faker) {

    // TODO: When 'Scheduled Priority' == 'Prior to'
    // TODO: When 'Recurrence' == 'Repetitive'
    // TODO: When 'Manual Affected' == 'Other'

    return [
        'type_id' => Type::ofTaskCardTypeNonRoutine()->get()->random()->id,
        'revision' => null,
        'ref_no' => null,
        'category_id' => Category::ofTaskCardEO()->get()->random()->id,
        'scheduled_priority_id' => Type::ofTaskCardEOScheduledPriority()->get()->random()->id,
        'scheduled_priority_amount' => '',
        'scheduled_priority_type' => '',
        'recurrence_id' => Type::ofTaskCardEORecurrence()->get()->random()->id,
        'recurrence_amount' => '',
        'recurrence_type' => '',
        'manual_affected_id' => Type::ofTaskCardEOManualAffected()->get()->random()->id,
        'manual_affected' => '',
    ];

});

$factory->state(TaskCard::class, 'si', function ($faker) {

    //

});

/** CALLBACKS */

$factory->afterCreating(TaskCard::class, function ($taskcard, $faker) {
    $aircraft = Aircraft::get()->random();

    if ($faker->boolean) {
        $taskcard->versions()->saveMany(factory(Version::class, rand(2, 4))->make());
    }

    // TODO: Save Many (1, 3) the aircraft_taskcard

    if ($faker->boolean) {
        $taskcard->accesses()->saveMany($aircraft->accesses);
    }

    if ($faker->boolean) {
        $taskcard->zones()->saveMany($aircraft->zones);
    }
});
