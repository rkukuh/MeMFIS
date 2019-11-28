<?php

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Branch;
use App\Models\Storage;
use App\Models\InventoryIn;
use App\Models\Employee;
use App\Models\GoodsReceived;
use Faker\Generator as Faker;

$factory->define(InventoryIn::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'INV-IN-DUM-' . $number,
        'storage_id' => function () {
            if (Storage::count()) {
                return Storage::get()->random()->id;
            }

            return factory(Storage::class)->create()->id;
        },
        'inventoried_at' => Carbon::now(),
        'inventoryinable_type' => $faker->randomElement(['App\Models\InventoryIn', 'App\Models\GoodsReceived']),
        'inventoryinable_id' => function () {
            if (GoodsReceived::count()) {
                return GoodsReceived::get()->random()->id;
            }

            return factory(GoodsReceived::class)->create()->id;
        },
        'additional' => function () use ($faker) {
            $additional = [
                'ref_no' => 'TC-INT-DUM-' . $faker->unixTime(),
                'created_by' => Employee::get()->random()->id,
            ];

            return $faker->randomElement([null, json_encode($additional)]);
        },
        'section' => null,
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(InventoryIn::class, function ($inventory_in, $faker) {

    $number = $faker->unixTime();

    // Branch

    if ($faker->boolean) {
        for ($i = 1; $i <= rand(1, 3); $i++) {
            $inventory_in->branches()->attach(Branch::get()->random()->id);
        }
    }

    // Item

    if ($faker->boolean) {
        $item = null;
        $price = rand(100, 200) * 100000;

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

            $inventory_in->items()->save($item, [
                'serial_number' => 'SN-DUM-' . $number,
                'quantity' => rand(1, 10),
                'quantity_in_primary_unit' => rand(1, 10),
                'unit_id' => $unit->id,
                'purchased_price' => $price,
                'total' => $price,
                'description' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

});
