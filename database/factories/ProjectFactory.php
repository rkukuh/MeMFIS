<?php

use App\Models\Unit;
use App\Models\Item;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Aircraft;
use App\Models\WorkPackage;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'PRJ-DUM-' . $number,
        'title' => 'Project Dummy #' . $number,
        'customer_id' => function () {
            if (Customer::count()) {
                return Customer::get()->random()->id;
            }

            return factory(Customer::class)->create()->id;
        },
        'aircraft_id' => function () {
            if (Aircraft::count()) {
                return Aircraft::get()->random()->id;
            }

            return factory(Aircraft::class)->create()->id;
        },
        'no_wo' => 'WO-' . $faker->randomNumber(),
        'aircraft_register' => 'AC-REG-' . $faker->randomNumber(),
        'aircraft_sn' => 'AC-SN-' . $faker->randomNumber(),
    ];

});

/** CALLBACKS */

$factory->afterCreating(Project::class, function ($project, $faker) {

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

            $project->items()->save($item, [
                'quantity' => rand(1, 10),
                'unit_id' => $unit->id,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

    // Work Package

    $workpackage = null;

    for ($i = 1; $i <= rand(5, 10); $i++) {
        $workpackage = factory(WorkPackage::class)->create();

        $project->workpackages()->save($workpackage, [
            'tat' => $faker->randomDigitNotNull,
            'performance_factor' => $faker->randomElement([
                null,
                (float)(rand(1, 5) * 0.5) // min:1-max:unlimited-step:0,1-eg:1;1,5;2;
            ]),
            'total_manhours' => $faker->randomFloat(2, 0, 9999),
            'total_manhours_with_performance_factor' => $faker->randomFloat(2, 0, 9999) * 2,
        ]);
    }

});