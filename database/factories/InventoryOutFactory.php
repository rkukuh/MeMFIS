<?php

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Branch;
use App\Models\Storage;
use App\Models\InventoryOut;
use App\Models\GoodsReceived;
use Faker\Generator as Faker;

$factory->define(InventoryOut::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'INV-OUT-DUM-' . $number,
        'storage_id' => function () {
            if (Storage::count()) {
                return Storage::get()->random()->id;
            }

            return factory(Storage::class)->create()->id;
        },
        'inventoried_at' => Carbon::now(),
        'inventoryoutable_type' => 'App\Models\InventoryOut',
        'inventoryoutable_id' => function () {
            if (GoodsReceived::count()) {
                return GoodsReceived::get()->random()->id;
            }

            return factory(GoodsReceived::class)->create()->id;
        },
        'section' => null,
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];
});

/** CALLBACKS */

$factory->afterCreating(InventoryOut::class, function ($inventory_out, $faker) {

    // Branch

    if ($faker->boolean) {
        for ($i = 1; $i <= rand(1, 3); $i++) {
            $inventory_out->branches()->save(Branch::get()->random());
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

            $inventory_out->items()->save($item, [
                'serial_number' => null,
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
