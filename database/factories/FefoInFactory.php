<?php

use Carbon\Carbon;
use App\Models\FefoIn;
use App\Models\Storage;
use App\Models\InventoryIn;
use App\Models\GoodsReceived;
use Faker\Generator as Faker;

$factory->define(FefoIn::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $item =  Storage::get()->random();

    return [
            'inventoryin_id' => function () {
                if (InventoryIn::count()) {
                    return InventoryIn::get()->random()->id;
                }

                return factory(InventoryIn::class)->create()->id;
            },
            'item_id' => $item->id,
            'storage_id' => function () {
                if (Storage::count()) {
                    return Storage::get()->random()->id;
                }

                return factory(Storage::class)->create()->id;
            },
            'fefoin_at' =>  Carbon::now(),
            'quantity' => rand(1, 10),
            'serial_number' => $faker->randomElement([null, 'SN-DUM-' . $number]),
            'grn_id' => function () {
                if (GoodsReceived::count()) {
                    return GoodsReceived::get()->random()->id;
                }

                return factory(GoodsReceived::class)->create()->id;
            },
            'price' => rand(10, 15) * 10000,
            'expired_at' => Carbon::now(),
    ];

});
