<?php

use Carbon\Carbon;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;
use App\Models\PurchaseRequest;

$factory->define(PurchaseOrder::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'number' => 'PO-' . $number,
        'supplier_id' => function () {
            if (Supplier::count()) {
                return Supplier::get()->random()->id;
            }

            return factory(Supplier::class)->create()->id;
        },
        'purchase_request_id' => function () {
            if (PurchaseRequest::count()) {
                return PurchaseRequest::get()->random()->id;
            }

            return factory(PurchaseRequest::class)->create()->id;
        },
        'ordered_at' => $faker->randomElement([null, Carbon::now()]),
        'valid_until' => $faker->randomElement([null, Carbon::now()]),
        'ship_at' => $faker->randomElement([null, Carbon::now()]),
        'exchange_rate' => rand(10, 15) * 1000,
        'total_before_tax' => rand(10, 100) * 1000000,
        'tax_amount' => rand(1, 10) * 10000,
        'total_after_tax' => rand(10, 100) * 1000000,
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(PurchaseOrder::class, function ($purchase_order, $faker) {

    // 

});