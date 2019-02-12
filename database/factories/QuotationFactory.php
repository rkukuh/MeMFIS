<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Quotation;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {

    $number  = $faker->unixTime();

    return [
        'number' => 'QTN-' . $number,
        'requested_at' => $faker->randomElement([null, Carbon::now()]),
        'valid_until' => $faker->randomElement([null, Carbon::now()]),
        'exchange_rate' => rand(10, 15) * 1000,
        'scheduled_payment_type' => function () use ($faker) {
            if (Type::ofScheduledPayment()->count()) {
                Type::ofScheduledPayment()->get()->random()->id;
            }

            return $faker->randomElement([
                factory(Type::class)->states('scheduled-payment')->create()->id,
            ]);
        },
        'scheduled_payment_amount' => rand(1, 10) * 1000000,
        'total' => rand(10, 100) * 1000000,
        'term_of_condition' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});
