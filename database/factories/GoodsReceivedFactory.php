<?php

use Carbon\Carbon;
use App\Models\Storage;
use App\Models\Employee;
use App\Models\GoodsReceived;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(GoodsReceived::class, function (Faker $faker) {

    $number  = $faker->unixTime();
    $plate_no = strtoupper($faker->randomLetter) . ' ' . $faker->numberBetween($min = 1000, $max = 9999) . ' ' . strtoupper($faker->randomLetter) . strtoupper($faker->randomLetter);

    return [
        'number' => 'GRN-' . $number,
        'received_by' => function () {
            if (Employee::count()) {
                return Employee::get()->random()->id;
            }

            return factory(Employee::class)->create()->id;
        },
        'received_at' => $faker->randomElement([null, Carbon::now()]),
        'vehicle_no' => $faker->randomElement([null, $plate_no]),
        'container_no' => $faker->randomElement([null, 'CON-' . $faker->numberBetween($min = 1000, $max = 9999)]),
        'purchase_order_id' => function () {
            if (PurchaseOrder::count()) {
                return PurchaseOrder::get()->random()->id;
            }

            return factory(PurchaseOrder::class)->create()->id;
        },
        'storage_id' => function () {
            if (Storage::count()) {
                return Storage::get()->random()->id;
            }

            return factory(Storage::class)->create()->id;
        },
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
