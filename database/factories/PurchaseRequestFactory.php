<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Project;
use App\Models\Aircraft;
use Faker\Generator as Faker;
use App\Models\PurchaseRequest;

$factory->define(PurchaseRequest::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'number' => $number,
        'type_id' => function () use ($faker) {
            if (Type::ofPurchaseRequest()->count()) {
                Type::ofPurchaseRequest()->get()->random()->id;
            }

            return $faker->randomElement([
                factory(Type::class)->states('purchase-request')->create()->id,
            ]);
        },
        'aircraft_id' => function () {
            if (Aircraft::count()) {
                return Aircraft::get()->random()->id;
            }

            return factory(Aircraft::class)->create()->id;
        },
        'requested_at' => $faker->randomElement([null, Carbon::now()]),
        'required_at' => $faker->randomElement([null, Carbon::now()]),
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(PurchaseRequest::class, function ($purchase_request, $faker) {

    // Project

    if (Project::count()) {
        for ($i = 1; $i <= rand(2, 3); $i++) {
            $project = Project::get()->random();

            $project->purchase_request_id = $purchase_request->id;
            
            $project->save();
        }
    } else {
        $purchase_request->projects()->saveMany(
            factory(Project::class, rand(2, 3))->make()
        );
    }

    // Item

    if ($faker->boolean) {
        $item = null;
        $unit = null;

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

            $purchase_request->items()->save($item, [
                'quantity' => rand(1, 10),
                'unit_id' => $unit->id,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

});