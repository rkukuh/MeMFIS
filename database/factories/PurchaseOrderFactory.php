<?php

use Carbon\Carbon;
use App\Models\PurchaseOrder;
use Faker\Generator as Faker;

$factory->define(PurchaseOrder::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'number' => 'PO-' . $number,
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
