<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Promo;
use App\Models\Vendor;
use App\Models\Currency;
use App\Models\Approval;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;
use App\Models\PurchaseRequest;

$factory->define(PurchaseOrder::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $valid_type = $faker->randomElement(['valid_until', 'valid_at']);
    $top_type = Type::ofTermOfPayment()->get()->random()->id;

    return [
        'number' => 'PO-DUM-' . $number,
        'purchase_request_id' => function () {
            if (PurchaseRequest::count()) {
                return PurchaseRequest::get()->random()->id;
            }

            return factory(PurchaseRequest::class)->create()->id;
        },
        'vendor_id' => function () {
            if (Vendor::count()) {
                return Vendor::get()->random()->id;
            }

            return factory(Vendor::class)->create()->id;
        },
        'ordered_at' => $faker->randomElement([null, Carbon::now()]),
        'valid_until' => function () use ($valid_type) {
            if ($valid_type == 'valid_until') {
                return Carbon::now();
            }
        },
        'valid_at' => function () use ($valid_type) {
            if ($valid_type == 'valid_at') {
                return Carbon::now();
            }
        },
        'shipping_address' => $faker->address,
        'ship_at' => $faker->randomElement([null, Carbon::now()]),
        'currency_id' => function () {
            if (Currency::count()) {
                return Currency::get()->random()->id;
            }

            return factory(Currency::class)->create()->id;
        },
        'subtotal' => rand(10, 15) * 10000,
        'discount_percent' => $faker->randomElement([5, 10, 15, 20, 25]),
        'discount_amount' => rand(10, 15) * 1000,
        'tax_percent' => $faker->randomElement([5, 10]),
        'tax_amount' => rand(10, 15) * 1000,
        'total_before_tax' => rand(10, 100) * 1000000,
        'exchange_rate' => rand(10, 15) * 1000,
        'total_after_tax' => rand(10, 100) * 1000000,
        'top_type' => $top_type,
        'top_day_amount' => function () use ($top_type) {
            if ($top_type == 95) {
                return rand(5, 100);
            }
        },
        'top_start_at' => function () use ($top_type) {
            if ($top_type == 95) {
                return Carbon::now();
            }
        },
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(PurchaseOrder::class, function ($purchase_order, $faker) {

    // Approval

    if ($faker->boolean) {
        $purchase_order->approvals()->save(factory(Approval::class)->make());
    }

    // Item

    $item = null;

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

        $purchase_order->items()->save($item, [
            'quantity' => rand(1, 10),
            'quantity_unit' => rand(1, 10),
            'unit_id' => $unit->id,
            'price' => rand(10, 100) * 1000000,
            'tax_percent' => $faker->randomElement([5, 10]),
            'tax_amount' => rand(10, 15) * 1000,
            'subtotal_before_discount' => rand(150, 200) * 1000000,
            'subtotal_after_discount' => rand(100, 150) * 1000000,
            'note' => $faker->randomElement([null, $faker->sentence]),
        ]);
    }

    // Promo
    
    if ($faker->boolean) {
        for ($i = 1; $i <= rand(1, 3); $i++) {
            $purchase_order->promos()->save(Promo::get()->random(), [
                'value'     => rand(1, 9) * 10,
                'amount'    => rand(100, 200) * 1000000,
            ]);
        }
    }

});
