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
        'inventoryinable_id' => GoodsReceived::get()->random()->id,
        'inventoryinable_type' => 'App\Models\GoodsReceived',
        'inventoried_at' => $faker->randomElement(Carbon::now()),
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];

});
