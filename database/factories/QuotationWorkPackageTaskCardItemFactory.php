<?php

use App\Models\Item;
use App\Models\TaskCard;
use App\Models\Quotation;
use App\Models\WorkPackage;
use Faker\Generator as Faker;
use App\Models\QuotationWorkPackageTaskCardItem;

$factory->define(QuotationWorkPackageTaskCardItem::class, function (Faker $faker) {

    return [
        'quotation_id' => function () {
            if (Quotation::count()) {
                return Quotation::get()->random()->id;
            }

            return factory(Quotation::class)->create()->id;
        },
        'workpackage_id'=> function (array $data) {
            if (Quotation::find($data['quotation_id']) && Quotation::find($data['quotation_id'])->workpackages()->count()) {
                return Quotation::find($data['quotation_id'])->workpackages()->get()->random()->id;
            }
        },
        'taskcard_id'=> function (array $data) {
            if (WorkPackage::find($data['workpackage_id']) && WorkPackage::find($data['workpackage_id'])->taskcards()->count()) {
                return WorkPackage::find($data['workpackage_id'])->taskcards()->get()->random()->id;
            }
        },
        'item_id'=> function (array $data) {
            if (TaskCard::find($data['taskcard_id']) && TaskCard::find($data['taskcard_id'])->items()->count()) {
                return TaskCard::find($data['taskcard_id'])->items()->get()->random()->id;
            }
        },
        'quantity' => rand(1, 10),
        'unit_id' => function (array $data) {
            if (Item::find($data['item_id']) && Item::find($data['item_id'])->units()->count()) {
                return Item::find($data['item_id'])->units()->get()->random()->id;
            }
        },
        'price_id' => function (array $data) {
            if (Item::find($data['item_id']) && Item::find($data['item_id'])->prices()->count()) {
                return Item::find($data['item_id'])->prices()->get()->random()->id;
            }
        },
        'price_amount' => $faker->randomElement([rand(10, 100) * 1000000]),
        'subtotal' => $faker->randomElement([rand(100, 1000) * 1000000]),
        'note' => $faker->randomElement([null, $faker->text]),
    ];

});
