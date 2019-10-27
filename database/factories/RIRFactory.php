<?php

use App\Models\RIR;
use App\Models\Vendor;
use App\Models\Employee;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(RIR::class, function (Faker $faker) {

    $number = $faker->unixTime();
    $plate_no = strtoupper($faker->randomLetter) . ' '
                . $faker->numberBetween(1000, 9999) . ' '
                . strtoupper($faker->randomLetter)
                . strtoupper($faker->randomLetter);

    return [
        'number' => 'RIR-DUM-' . $number,
        'rir_date' => Carbon::now(),
        'purchase_order_id' => function () {
            if (PurchaseOrder::count()) {
                return PurchaseOrder::get()->random()->id;
            }

            return factory(PurchaseOrder::class)->create()->id;
        },
        'vendor_id' => function () {
            if (Vendor::count()) {
                return Vendor::get()->random()->id;
            }

            return factory(Vendor::class)->create()->id;
        },
        'received_by' => function () {
            if (Employee::count()) {
                return Employee::get()->random()->id;
            }

            return factory(Employee::class)->create()->id;
        },
        'vehicle_no' => $plate_no,
        'delivery_document_number' => null,
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];

});
