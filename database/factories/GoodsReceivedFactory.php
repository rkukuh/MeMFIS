<?php

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Storage;
use App\Models\Employee;
use App\Models\GoodsReceived;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(GoodsReceived::class, function (Faker $faker) {

    $is_approved = false;
    $number = $faker->unixTime();
    $plate_no = strtoupper($faker->randomLetter) . ' ' . $faker->numberBetween($min = 1000, $max = 9999) . ' ' . strtoupper($faker->randomLetter) . strtoupper($faker->randomLetter);

    if ($faker->boolean) {
        $is_approved = true;
    }

    return [
        'number' => 'GRN-DUM-' . $number,
        'received_by' => function () {
            if (Employee::count()) {
                return Employee::get()->random()->id;
            }

            return factory(Employee::class)->create()->id;
        },
        'received_at' => $faker->randomElement([null, Carbon::now()]),
        'vehicle_no' => $faker->randomElement([null, $plate_no]),
        'container_no' => $faker->randomElement([null, 'CON-' . $faker->numberBetween($min = 1000, $max = 9999)]),
        'purchase_order_id' => function () {
            if (PurchaseOrder::count()) {
                return PurchaseOrder::get()->random()->id;
            }

            return factory(PurchaseOrder::class)->create()->id;
        },
        'storage_id' => function () {
            if (Storage::count()) {
                return Storage::get()->random()->id;
            }

            return factory(Storage::class)->create()->id;
        },
        'approved_by' => function () use ($is_approved) {
            if ($is_approved) {
                if (Employee::count()) {
                    return Employee::get()->random()->id;
                }
    
                return factory(Employee::class)->create()->id;
            }
        },
        'approved_at' => function () use ($is_approved, $faker) {
            if ($is_approved) {
                return Carbon::now();
            }
        },
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(GoodsReceived::class, function ($goods_received, $faker) {

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

            $goods_received->items()->save($item, [
                'quantity' => rand(1, 10),
                'already_received' => rand(2, 3),
                'unit_id' => $unit->id,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

});