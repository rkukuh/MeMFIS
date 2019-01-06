<?php

use App\Models\Type;
use App\Models\Access;
use App\Models\Category;
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

    $scheduled_priority = Type::ofTaskCardEOScheduledPriority()->get()->random();
    $recurrence = Type::ofTaskCardEORecurrence()->get()->random();
    $manual_affected = Type::ofTaskCardEOManualAffected()->get()->random();

    return [
        'type_id' => Type::ofTaskCardTypeNonRoutine()->get()->random()->id,
        'revision' => null,
        'ref_no' => null,
        'category_id' => Category::ofTaskCardEO()->get()->random()->id,
        'scheduled_priority_id' => $scheduled_priority->id,
        'scheduled_priority_amount' => function () use ($scheduled_priority) {
            if ($scheduled_priority->code == 'prior-to') {
                return rand(1, 10);
            } else {
                return null;
            }
        },
        'scheduled_priority_type' => function () use ($scheduled_priority, $faker) {
            if ($scheduled_priority->code == 'prior-to') {
                return $faker->randomElement(['days', 'weeks', 'months']);
            } else {
                return null;
            }
        },
        'recurrence_id' => $recurrence->id,
        'recurrence_amount' => function () use ($recurrence) {
            if ($recurrence->code == 'repetitive') {
                return rand(1, 10);
            } else {
                return null;
            }
        },
        'recurrence_type' => function () use ($recurrence, $faker) {
            if ($recurrence->code == 'repetitive') {
                return $faker->randomElement(['days', 'weeks', 'months']);
            } else {
                return null;
            }
        },
        'manual_affected_id' => $manual_affected->id,
        'manual_affected' => function () use ($manual_affected, $faker) {
            if ($manual_affected->code == 'other') {
                return $faker->text;
            } else {
                return null;
            }
        },
    ];

});

$factory->state(TaskCard::class, 'si', function ($faker) {

    //

});

/** CALLBACKS */

$factory->afterCreating(TaskCard::class, function ($taskcard, $faker) {
    $aircraft = Aircraft::get()->random();

    $taskcard->aircrafts()->save($aircraft);

    if ($faker->boolean) {
        $taskcard->accesses()->saveMany($aircraft->accesses);
    }

    if ($faker->boolean) {
        $taskcard->zones()->saveMany($aircraft->zones);
    }

    // TODO: Set its child(s), if any
});
