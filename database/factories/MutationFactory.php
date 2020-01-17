<?php

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Storage;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Mutation;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Mutation::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'MUT-DUM-' . $number,
        'storage_out' => Storage::get()->random()->id,
        'storage_in' => Storage::get()->random()->id,
        'mutated_at' => Carbon::now(),
        'shipping_by' => Employee::get()->random()->id,
        'received_by' => Employee::get()->random()->id,
        'note' => $faker->randomElement([null, $faker->sentence]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(Mutation::class, function ($inventory_out, $faker) {

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
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }
});
