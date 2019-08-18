<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Status;
use App\Models\Project;
use App\Models\Manhour;
use App\Models\Customer;
use App\Models\Currency;
use App\Models\TaskCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Quotation;
use App\Models\WorkPackage;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'QTN-DUM-' . $number,
        'parent_id' => null,
        'project_id' => function () {
            if (Project::count()) {
                return Project::get()->random()->id;
            }

            return factory(Project::class)->create()->id;
        },
        'attention' => function (array $quotation) {
            return Customer::get()->random()->attention;
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
        'subtotal' => rand(10, 100) * 1000000,
        'charge' => function () use ($faker) {
            $charges = [];

            for ($i = 1; $i <= rand(1, 4); $i++) {
                
                $charge['type'] = 'Biaya ' . $i;
                $charge['amount'] = rand(1, 10) * 100000;

                array_push($charges, $charge);
            }

            return $faker->randomElement([null, json_encode($charges)]);
        },
        'ppn' => $faker->randomElement([null, 10]),
        'grandtotal' => rand(101, 200) * 1000000,
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
        'origin_project' => null,
        'origin_currency' => null,
        'origin_scheduled_payment_type' => null,
        'origin_quotation' => null,
        'origin_quotation_workpackages' => null,
        'origin_quotation_workpackage_items' => null,
        'origin_quotation_workpackage_taskcard_items' => null,
        'origin_quotation_htcrr_items' => null,
    ];

});

/** CALLBACKS */

$factory->afterCreating(Quotation::class, function ($quotation, $faker) {

    // Approval

    if ($faker->boolean) {
        $quotation->approvals()->save(factory(Approval::class)->make());
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
                'pricelist_unit_id' => $unit->id,
                'pricelist_price' => rand(1, 10) * 1000000,
                'subtotal' => rand(10, 20) * 1000000,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

    // Progress

    $quotation->progresses()->save(
        factory(Progress::class)->make([
            // Set all progress to 'open' to make testing phase easier
            'status_id' => Status::ofQuotation()->where('code', 'open')->first()
        ])
    );

    // WorkPackage

    if ($faker->boolean) {
        $workpackage = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
            if (WorkPackage::count()) {
                $workpackage = WorkPackage::get()->random();
            } else {
                $workpackage = factory(WorkPackage::class)->create();
            }

            $disc_type = null;
            $disc_value = null;

            if ($faker->boolean) {
                $disc_type = $faker->randomElement(['percentage', 'amount']);
                
                if ($disc_type == 'percentage') {
                    $disc_value = $faker->randomElement([5, 10, 15, 20, 25]);
                } 
                else if ($disc_type == 'amount') {
                    $disc_value = rand(1, 10) * 100000;
                }
            }

            $quotation->workpackages()->save($workpackage, [
                'manhour_total' => rand(10, 20),
                'manhour_rate_id' => Manhour::get()->random()->id,
                'manhour_rate_amount' => rand(10, 20) * 1000000,
                'discount_type' => $disc_type,
                'discount_value' => $disc_value,
                'description' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }
    
});