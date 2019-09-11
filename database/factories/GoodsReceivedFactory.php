<?php

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Storage;
use App\Models\Employee;
use App\Models\Approval;
use App\Models\GoodsReceived;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(GoodsReceived::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $plate_no = strtoupper($faker->randomLetter) . ' ' 
                . $faker->numberBetween(1000, 9999) . ' ' 
                . strtoupper($faker->randomLetter) 
                . strtoupper($faker->randomLetter);

    return [
        'number' => 'GRN-DUM-' . $number,
        'purchase_order_id' => function () {
            if (PurchaseOrder::count()) {
                return PurchaseOrder::get()->random()->id;
            }

            return factory(PurchaseOrder::class)->create()->id;
        },
        'received_by' => function () {
            if (Employee::count()) {
                return Employee::get()->random()->id;
            }

            return factory(Employee::class)->create()->id;
        },
        'received_at' => Carbon::now(),
        'vehicle_no' => $plate_no,
        'container_no' => 'CON-' . $faker->numberBetween(1000, 9999),
        'storage_id' => function () {
            if (Storage::count()) {
                return Storage::get()->random()->id;
            }

            return factory(Storage::class)->create()->id;
        },
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
        'additionals' => function () use ($faker) {
            $additionals = [
                'SupplierRefNo' => 'TC-INT-DUM-' . $faker->unixTime(),
                'SupplierRefDate' => Carbon::now(),
            ];

            return $faker->randomElement([null, json_encode($additionals)]);
        },
        'origin_vendor_coa' => null,
    ];

});

/** CALLBACKS */

$factory->afterCreating(GoodsReceived::class, function ($goods_received, $faker) {

    // Item

    if ($faker->boolean) {
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

            $goods_received->items()->save($item, [
                'quantity' => rand(1, 10),
                'quantity_unit' => rand(1, 10),
                'unit_id' => $unit->id,
                'already_received_amount' => rand(2, 3),
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }
    
    // Approval

    if ($faker->boolean) {
        $goods_received->approvals()->save(factory(Approval::class)->make());
    }

});