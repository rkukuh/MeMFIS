<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Currency;
use App\Models\TaskCard;
use App\Models\Quotation;
use App\Models\WorkPackage;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'QTN-DUM-' . $number,
        'project_id' => function () {
            if (Project::count()) {
                return Project::get()->random()->id;
            }

            return factory(Project::class)->create()->id;
        },
        'customer_id' => function () {
            if (Customer::count()) {
                return Customer::get()->random()->id;
            }

            return factory(Customer::class)->create()->id;
        },
        'requested_at' => $faker->randomElement([null, Carbon::now()]),
        'valid_until' => $faker->randomElement([null, Carbon::now()]),
        'currency_id' => function () {
            if (Currency::count()) {
                return Currency::get()->random()->id;
            }

            return factory(Currency::class)->create()->id;
        },
        'exchange_rate' => rand(10, 15) * 1000,
        'total' => rand(10, 100) * 1000000,
        'scheduled_payment_type' => function () {
            if (Type::ofScheduledPayment()->count()) {
                return Type::ofScheduledPayment()->get()->random()->id;
            }

            return factory(Type::class)->states('scheduled-payment')->create()->id;
        },
        'scheduled_payment_amount' => function () {
            $amounts = [];
            
            for ($i = 0; $i < rand(2, 5); $i++) {
                $amounts[] = rand(1, 10) * 1000000;
            }

            return json_encode($amounts);
        },
        'term_of_payment' => function () use ($faker) {
            return $faker->randomElement([null, $faker->randomDigitNotNull]);
        },
        'term_of_condition' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
        'description' => $faker->randomElement([null, $faker->paragraph(rand(10, 20))]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(Quotation::class, function ($quotation, $faker) {

    // WorkPackage

    if ($faker->boolean) {
        $workpackage = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
            if (WorkPackage::count()) {
                $workpackage = WorkPackage::get()->random();
            } else {
                $workpackage = factory(WorkPackage::class)->create();
            }

            $quotation->workpackages()->save($workpackage, [
                'manhour_total' => rand(10, 20),
                'manhour_rate' => rand(10, 20) * 1000000,
                'description' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

    // Item

    if ($faker->boolean) {
        $item = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
            if (TaskCard::count()) {
                $taskcard = TaskCard::get()->random();
            } else {
                $taskcard = factory(TaskCard::class)->create();
            }

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

            $quotation->items()->save($item, [
                'taskcard_id' => $taskcard->id,
                'pricelist_unit' => $unit->id,
                'pricelist_price' => rand(1, 10) * 1000000,
                'subtotal' => rand(10, 20) * 1000000,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }
    
});