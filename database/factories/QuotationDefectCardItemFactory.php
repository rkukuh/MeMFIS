<?php

use App\Models\Item;
use App\Models\Unit;
use App\Models\Price;
use App\Models\Quotation;
use App\Models\DefectCard;
use Faker\Generator as Faker;
use App\Models\QuotationDefectCardItem;

$factory->define(QuotationDefectCardItem::class, function (Faker $faker) {

    return [
        'quotation_id' => function () {
            return Quotation::get()->random()->id;
        },
        'defectcard_id'=> function (array $data) {
            return DefectCard::get()->random()->id;
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
