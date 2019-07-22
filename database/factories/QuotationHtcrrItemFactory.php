<?php

use App\Models\Unit;
use App\Models\Item;
use App\Models\Price;
use App\Models\HtCrr;
use App\Models\Quotation;
use Faker\Generator as Faker;
use App\Models\QuotationHtcrrItem;

$factory->define(QuotationHtcrrItem::class, function (Faker $faker) {

    return [
        'quotation_id' => function () {
            return Quotation::get()->random()->id;
        },
        'htcrr_id'=> function (array $data) {
            return HtCrr::get()->random()->id;
        },
        'item_id'=> function (array $data) {
            return Item::get()->random()->id;
        },
        'quantity' => rand(1, 10),
        'unit_id' => function (array $data) {
            return Unit::get()->random()->id;
        },
        'price_id' => function (array $data) {
            return Price::get()->random()->id;
        },
        'price_amount' => $faker->randomElement([rand(10, 100) * 1000000]),
        'subtotal' => $faker->randomElement([rand(100, 1000) * 1000000]),
        'note' => $faker->randomElement([null, $faker->text]),
    ];

});
