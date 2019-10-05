<?php

use Carbon\Carbon;
use App\Models\Storage;
use App\Models\InventoryIn;
use App\Models\GoodsReceived;
use Faker\Generator as Faker;

$factory->define(InventoryIn::class, function (Faker $faker) {

    return [
        'storage_id' => function () {
            if (Storage::count()) {
                return Storage::get()->random()->id;
            }
            
            return factory(Storage::class)->create()->id;
        },
        'inventoried_at' => $faker->randomElement(Carbon::now()),
        // 'inventoryinable_type' => 'App\Models\GoodsReceived',
        // 'inventoryinable_id' => function () {
        //     if (GoodsReceived::count()) {
        //         return GoodsReceived::get()->random()->id;
        //     }

        //     return factory(GoodsReceived::class)->create()->id;
        // },
        'inventoryinable_type' => null,
        'inventoryinable_id' => null,
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];

});
