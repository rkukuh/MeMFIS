<?php

use App\Models\Item;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\WorkPackage;
use Faker\Generator as Faker;

$factory->define(WorkPackage::class, function (Faker $faker) {

    $code = $faker->unixTime();

    return [
        'code' => $faker->randomElement([null, 'WP-' . $code]),
        'title' => 'WorkPackage Dummy #' . $code,
        'is_template' => $faker->boolean(),
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

    // Task Card

    $taskcard = null;

    for ($i = 1; $i <= rand(5, 10); $i++) {
        if (TaskCard::count()) {
            $taskcard = TaskCard::get()->random();
        } else {
            $taskcard = factory(TaskCard::class)->create();
        }

        $workpackage->taskcards()->save($taskcard);
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

            $workpackage->items()->save($item, [
                'quantity' => rand(1, 10)
            ]);
        }
    }

});
