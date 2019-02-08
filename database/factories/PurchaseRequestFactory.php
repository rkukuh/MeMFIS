<?php

use Carbon\Carbon;
use App\Models\Type;
use Faker\Generator as Faker;
use App\Models\PurchaseRequest;

$factory->define(PurchaseRequest::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'number' => $number,
        'type_id' => function () use ($faker) {
            if (Type::ofPurchaseRequest()->count()) {
                Type::ofPurchaseRequest()->get()->random()->id;
            }

            return $faker->randomElement([
                factory(Type::class)->states('purchase-request')->create()->id,
            ]);
        },
        'requested_at' => $faker->randomElement([null, Carbon::now()]),
        'required_at' => $faker->randomElement([null, Carbon::now()]),
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
