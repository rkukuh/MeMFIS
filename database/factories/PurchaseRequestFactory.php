<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Project;
use App\Models\Employee;
use Faker\Generator as Faker;
use App\Models\PurchaseRequest;

$factory->define(PurchaseRequest::class, function (Faker $faker) {

    $is_approved = false;
    $number = $faker->unixTime();

    if ($faker->boolean) {
        $is_approved = true;
    }

    return [
        'number' => 'PR-DUM-' . $number,
        'type_id' => function () use ($faker) {
            if (Type::ofPurchaseRequest()->count()) {
                return Type::ofPurchaseRequest()->get()->random()->id;
            }

            return factory(Type::class)->states('purchase-request')->create()->id;
        },
        'requested_at' => $faker->randomElement([null, Carbon::now()]),
        'required_at' => $faker->randomElement([null, Carbon::now()]),
        'approved_by' => function () use ($is_approved) {
            if ($is_approved) {
                if (Employee::count()) {
                    return Employee::get()->random()->id;
                }
    
                return factory(Employee::class)->create()->id;
            }
        },
        'approved_at' => function () use ($is_approved) {
            if ($is_approved) {
                return Carbon::now();
            }
        },
        'project_id' => function () use ($faker) {
            if (Project::count()) {
                return Project::get()->random()->id;
            }

            return $faker->randomElement([null, factory(Project::class)->create()->id]);
        },
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(PurchaseRequest::class, function ($purchase_request, $faker) {

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