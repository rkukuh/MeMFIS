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
        'effectivity' => null,
        'performance_factor' => $faker->randomElement([
            null,
            rand(0, 10) / 10 // min:0-max:1-step:0,1
        ]),
        'sequence' => $faker->randomElement([null, rand(1, 10)]),
        'version' => $faker->randomElement([null, $version]),
        'description' => $faker->paragraph(rand(10, 20)),

        // 'otr_certification_id' => null,  // TODO: Refactor its entity name
    ];

});

/** STATES */

$factory->state(TaskCard::class, 'basic', function ($faker) {

    $number  = $faker->unixTime();

    return [
        'number' => 'TC-' . $number,
        'title' => 'TaskCard Basic Dummy #' . $number,
        'type_id' => Type::ofTaskCardTypeRoutine()->get()->random()->id,
    ];

});

$factory->state(TaskCard::class, 'eo', function ($faker) {

    $number  = $faker->unixTime();

    $scheduled_priority = Type::ofTaskCardEOScheduledPriority()->get()->random();
    $recurrence = Type::ofTaskCardEORecurrence()->get()->random();
    $manual_affected = Type::ofTaskCardEOManualAffected()->get()->random();

    return [
        // EO Header attributes
        'number' => 'EO-' . $number,
        'title' => 'Engineering Order Dummy #' . $number,
        'type_id' => Type::ofTaskCardTypeNonRoutine()->get()->random()->id,
        'revision' => rand(1, 10),
        'reference' => 'REF-' . $number,
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

        // These attributes are filled on 'taskcard_eo' table
        'work_area' => null,
        'manhour' => null,
        'helper_quantity' => null,
        'is_rii' => null,
        'performance_factor' => null,
        'sequence' => null,
        'version' => null,
        'description' => null,
    ];

});

$factory->state(TaskCard::class, 'si', function ($faker) {

    $number  = $faker->unixTime();

    return [
        'number' => 'SI-' . $number,
        'title' => 'Special Instruction Dummy #' . $number,
        'type_id' => Type::where('of', 'taskcard-type-non-routine')
                         ->where('code', 'si')
                         ->first()->id,
        'performance_factor' => null,
        'version' => null,
    ];

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

});

$factory->afterCreatingState(TaskCard::class, 'basic', function ($taskcard, $faker) {

    if ($faker->boolean) {
        $taskcard->related_to()->saveMany(TaskCard::get()->random(rand(1, 3)));
    }

});

$factory->afterCreatingState(TaskCard::class, 'eo', function ($taskcard, $faker) {

    for ($i = 1; $i < rand(5, 10); $i++) {
        $taskcard->eo_instructions()->create([
            'work_area' => Type::ofWorkArea()->get()->random()->id,
            'manhour' => $faker->randomFloat(2, 0, 9999),
            'helper_quantity' => $faker->randomElement(null, rand(1, 10)),
            'is_rii' => $faker->boolean,
            'performance_factor' => $faker->randomElement([
                null,
                rand(0, 10) / 10 // min:0-max:1-step:0,1
            ]),
            'sequence' => $faker->randomElement([null, rand(1, 10)]),
            'description' => $faker->paragraph(rand(10, 20)),
            'note' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
        ]);
    }

});

$factory->afterCreatingState(TaskCard::class, 'si', function ($taskcard, $faker) {

    //

});
