<?php

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Vendor;
use App\Models\Currency;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;
use App\Models\PurchaseRequest;

$factory->define(PurchaseOrder::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'PO-' . $number,
        'vendor_id' => function () {
            if (Vendor::count()) {
                return Vendor::get()->random()->id;
            }

            return factory(Vendor::class)->create()->id;
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
        'currency_id' => function () {
            if (Currency::count()) {
                return Currency::get()->random()->id;
            }

            return factory(Currency::class)->create()->id;
        },
        'exchange_rate' => rand(10, 15) * 1000,
        'total_before_tax' => rand(10, 100) * 1000000,
        'tax_amount' => rand(1, 10) * 10000,
        'total_after_tax' => rand(10, 100) * 1000000,
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(PurchaseOrder::class, function ($purchase_order, $faker) {

    // Item

    if ($faker->boolean) {
        $item = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
            if (Item::count()) {
                $item = Item::get()->random();
            } else {
                $item = factory(Item::class)->create();
            }

            $purchase_order->items()->save($item, [
                'quantity' => rand(1, 10),
                'price' => rand(10, 100) * 1000000,
                'subtotal_before_discount' => rand(100, 200) * 1000000,
                'discount_percentage' => $faker->randomElement([5, 10, 15, 20]),
                'discount_amount' => rand(10, 20) * 100000,
                'subtotal_after_discount' => rand(100, 200) * 1000000,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

});