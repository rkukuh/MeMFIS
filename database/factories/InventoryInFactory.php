<?php

use Carbon\Carbon;
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
