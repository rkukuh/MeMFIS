<?php

use App\Models\Type;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Project;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Employee;
use App\Models\Aircraft;
use App\Models\Quotation;
use App\Models\DefectCard;
use Faker\Generator as Faker;

$factory->define(DefectCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'DC-DUM-' . $number,
        'jobcard_id' => JobCard::get()->random()->id,
        'project_additional_id' => null,
        'quotation_additional_id' => null,
        'engineer_quantity' => rand(1, 10),
        'helper_quantity' => rand(10, 100),
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'is_rii' => $faker->boolean,
        'complaint' => $faker->randomElement([null, $faker->text]),
        'description' => $faker->randomElement([null, $faker->text]),
        'origin_jobcard' => null,
        'origin_project_additional' => null,
        'origin_quotation_additional' => null,
        'origin_defectcard_items' => null,
        'origin_defectcard_propose_corrections' => null,
    ];

});

/** CALLBACKS */

$factory->afterCreating(DefectCard::class, function ($defectcard, $faker) {

    // Aircraft's Zone

    $aircraft = null;

    if (Aircraft::count()) {
        $aircraft = Aircraft::get()->random();
    } else {
        $aircraft = factory(Aircraft::class)->create();
    }

    if ($faker->boolean) {
        $defectcard->zones()->saveMany($aircraft->zones);
    }

    // Approval

    if ($faker->boolean) {
        $defectcard->approvals()->save(factory(Approval::class)->make());
    }

    // Helper (Employee)

    for ($i = 0; $i < rand(1, 3); $i++) {
        $defectcard->helpers()->save(Employee::get()->random());
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
                'note' => $faker->randomElement([null, $faker->text]),
            ]);
        }
    }

    // Progress

    $defectcard->progresses()->save(
        factory(Progress::class)->make([
            // Set all progress to 'open' to make testing phase easier
            'status_id' => Status::ofDefectCard()->where('code', 'open')->first()
        ])
    );

    // Project (additional)

    if ($faker->boolean) {
        $defectcard->project_additional()->associate(Project::get()->random());
        $defectcard->quotation_additional()->associate(Quotation::get()->random());
        
        $defectcard->save();
    }

    // Propose Correction

    for ($i = 0; $i < rand(1, 5); $i++) {
        $propose_correction = Type::ofDefectCardProposeCorrection()->get()->random();

        $defectcard->propose_corrections()->attach(
            $propose_correction, [
            'propose_correction_text' => $faker->randomElement([null, $faker->sentence]),
        ]);
    }

    // Skill

    for ($i = 1; $i <= rand(1, 3); $i++) {
        if (Type::ofTaskCardSkill()->count()) {
            $skill = Type::ofTaskCardSkill()->get()->random();
        }
        else {
            $skill = factory(Type::class)->states('taskcard-skill')->create();
        }

        $defectcard->skills()->attach($skill);
    }
    
});