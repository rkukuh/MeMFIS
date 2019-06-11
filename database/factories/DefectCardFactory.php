<?php

use App\Models\Type;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\DefectCard;
use Faker\Generator as Faker;

$factory->define(DefectCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'DC-DUM-' . $number,
        'jobcard_id' => JobCard::get()->random()->id,
        'engineer_quantity' => rand(1, 10),
        'helper_quantity' => rand(10, 100),
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'is_rii' => $faker->boolean,
        'complaint' => $faker->randomElement([null, $faker->text]),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(DefectCard::class, function ($defectcard, $faker) {

    // Approval

    if ($faker->boolean) {
        $defectcard->approvals()->save(factory(Approval::class)->make());
    }

    // Item

    if ($faker->boolean) {
        $item = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
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

            $defectcard->items()->save($item, [
                'quantity' => rand(10, 100),
                'unit_id' => $unit->id,
                'ipc_ref' => $faker->numerify('REF-#####'),
                'sn_on' => $faker->numerify('SN-ON-#####'),
                'sn_off' => $faker->numerify('SN-OFF-#####'),
            ]);
        }
    }

    // Progress

    for ($i = 0; $i < rand(1, Status::ofDefectCard()->count()); $i++) {
        $defectcard->progresses()->save(
            factory(Progress::class)->make([
                'status_id' => Status::ofDefectCard()->get()->first()->id + $i
            ])
        );
    }   

    // Propose Correction

    for ($i = 0; $i < rand(1, 5); $i++) {
        $propose_correction = Type::ofDefectCardProposeCorrection()->get()->random();

        $defectcard->propose_corrections()->attach(
            $propose_correction, [
            'propose_correction_text' => $faker->randomElement([null, $faker->sentence]),
        ]);
    }
    
});