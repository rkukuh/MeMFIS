<?php

use App\Models\Unit;
use App\Models\Item;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\WorkPackage;
use App\Models\EOInstruction;
use Faker\Generator as Faker;

$factory->define(WorkPackage::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'WP-DUM-' . $number]),
        'title' => 'WorkPackage Dummy #' . $number,
        'is_template' => $faker->boolean,
        'aircraft_id' => function () {
            if (Aircraft::count()) {
                return Aircraft::get()->random()->id;
            }

            return factory(Aircraft::class)->create()->id;
        },
        'description' => $faker->randomElement([null, $faker->text(rand(100, 500) * 10)]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(WorkPackage::class, function ($workpackage, $faker) {

    // EO Instruction

    $eo_instruction = null;

    for ($i = 1; $i <= rand(5, 10); $i++) {
        if (EOInstruction::count()) {
            $eo_instruction = EOInstruction::get()->random();
        } else {
            $eo_instruction = factory(EOInstruction::class)->create();
        }

        $workpackage->eo_instructions()->save($eo_instruction, [
            'sequence' => $i,
            'is_mandatory' => $faker->boolean,
        ]);
    }

    // Task Card

    $taskcard = null;

    for ($i = 1; $i <= rand(5, 10); $i++) {
        if (TaskCard::count()) {
            $taskcard = TaskCard::get()->random();
        } else {
            $taskcard = factory(TaskCard::class)->create();
        }

        $workpackage->taskcards()->save($taskcard, [
            'sequence' => $i,
            'is_mandatory' => $faker->boolean,
        ]);
    }

    // Item

    if ($faker->boolean) {
        $item = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
            if (Item::count()) {
                $item = Item::get()->random();
            } else {
                $item = factory(Item::class)->create();
            }

            if (Unit::count()) {
                $unit = Unit::get()->random();
            } else {
                $unit = factory(Unit::class)->create();
            }

            $workpackage->items()->save($item, [
                'quantity' => rand(1, 10),
                'unit_id' => $unit->id,
            ]);
        }
    }

});
