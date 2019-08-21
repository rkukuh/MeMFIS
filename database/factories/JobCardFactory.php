<?php

use App\Models\Status;
use App\Models\JobCard;
use App\Models\Station;
use App\Models\TaskCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Employee;
use App\Models\Quotation;
use App\Models\Inspection;
use App\Models\EOInstruction;
use Faker\Generator as Faker;

$factory->define(JobCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    $jobcardable_type = null;
    $jobcardable_entity = null;
    $jobcardable = $faker->randomElement(['taskcard', 'eo_instruction']);

    if ($jobcardable == 'taskcard') {
        $jobcardable_entity = TaskCard::where('id', '>', 500)->get()->random();
        $jobcardable_type = 'App/Models/TaskCard';
    }
    else if ($jobcardable == 'eo_instruction') {
        $jobcardable_entity = EOInstruction::get()->random();
        $jobcardable_type = 'App/Models/EOInstruction';
    }

    return [
        'number' => 'JC-DUM-' . $number,
        'jobcardable_id' => $jobcardable_entity->id,
        'jobcardable_type' => $jobcardable_type,
        'quotation_id' => Quotation::get()->random()->id,
        'is_rii' => $faker->boolean,
        'is_mandatory' => $faker->boolean,
        'station_id' => $faker->randomElement([null, Station::get()->random()->id]),
        'additionals' => function () use ($faker) {
            $additionals = null;

            if ($faker->boolean) {
                $additionals['TSN'] = 'TSN-102030';
            }

            if ($faker->boolean) {
                $additionals['CSN'] = 'CSN-908070';
            }

            return $faker->randomElement([null, json_encode($additionals)]);
        },
        'origin_quotation' => null,
        'origin_jobcardable' => $jobcardable_entity->toJson(),
        'origin_jobcardable_items' => $jobcardable_entity->items->toJson(),
        'origin_jobcard_helpers' => null,
    ];

});

/** CALLBACKS */

$factory->afterCreating(JobCard::class, function ($jobcard, $faker) {

    // Approval

    if ($faker->boolean) {
        $jobcard->approvals()->save(factory(Approval::class)->make());
    }

    // Helper (Employee)

    for ($i = 0; $i < rand(1, 3); $i++) {
        $jobcard->helpers()->save(Employee::get()->random());
    }

    // Inspection

    for ($i = 0; $i < rand(1, 3); $i++) {
        $jobcard->inspections()->save(factory(Inspection::class)->make());
    }

    // Progress

    $jobcard->progresses()->save(
        factory(Progress::class)->make([
            // Set all progress to 'open' to make testing phase easier
            'status_id' => Status::ofJobCard()->where('code', 'open')->first()
        ])
    );
    
});