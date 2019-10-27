<?php

use App\Models\RIR;
use App\Models\Type;
use App\Models\Vendor;
use App\Models\Status;
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
        'vehicle_no' => $plate_no,
        'delivery_document_number' => null,
        'status_id' => Status::ofRIR()->get()->random()->id,
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
        'packing_type' => Type::ofRIRPackingAndHandlingCheckType()->get()->random()->id,
        'packing_condition' => Type::ofRIRPackingAndHandlingCheckCondition()->get()->random()->id,
        'unsatisfactory_packing' => null,
        'received_by' => function () {
            if (Employee::count()) {
                return Employee::get()->random()->id;
            }

            return factory(Employee::class)->create()->id;
        },
        'received_at' => $faker->randomElement([null, Carbon::now()]),
        'decision' => $faker->randomElement([null, $faker->sentence]),
        'description' => $faker->randomElement([null, $faker->sentence]),
    ];

});
