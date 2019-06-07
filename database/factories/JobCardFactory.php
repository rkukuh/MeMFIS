<?php

use App\Models\Status;
use App\Models\JobCard;
use App\Models\TaskCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Quotation;
use App\Models\Inspection;
use Faker\Generator as Faker;

$factory->define(JobCard::class, function (Faker $faker) {

    $taskcard = null;
    $number = $faker->unixTime();

    if (TaskCard::count()) {
        $taskcard = TaskCard::get()->random();
    } 
    else {
        $taskcard = factory(TaskCard::class)->create();
    }

    return [
        'number' => 'JC-DUM-' . $number,
        'taskcard_id' => $taskcard->id,
        'quotation_id' => Quotation::get()->random()->id,
        'data_taskcard' => $taskcard->toJson(),
        'data_taskcard_items' => $taskcard->items->toJson(),
    ];

});

/** CALLBACKS */

$factory->afterCreating(JobCard::class, function ($jobcard, $faker) {

    // Approval

    if ($faker->boolean) {
        $jobcard->approvals()->save(factory(Approval::class)->make());
    }

    // Progress

    for ($i = 0; $i < rand(1, Status::ofJobCard()->count()); $i++) {
        $jobcard->progresses()->save(
            factory(Progress::class)->make([
                'status_id' => Status::ofJobCard()->get()->first()->id + $i
            ])
        );
    }

    // Inspection

    for ($i = 0; $i < rand(1, 3); $i++) {
        $jobcard->inspections()->save(factory(Inspection::class)->make());
    }
    
});