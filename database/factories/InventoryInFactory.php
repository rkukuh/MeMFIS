<?php

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Storage;
use App\Models\InventoryIn;
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
        'inventoryinable_type' => 'App\Models\GoodsReceived',
        'inventoryinable_id' => function () {
            if (GoodsReceived::count()) {
                return GoodsReceived::get()->random()->id;
            }

            return factory(GoodsReceived::class)->create()->id;
        },
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(InventoryIn::class, function ($inventory_in, $faker) {

    // Branch
    
    if ($faker->boolean) {
        for ($i = 1; $i <= rand(1, 3); $i++) {
            $inventory_in->branches()->save(Branch::get()->random());
        }
    }

});
