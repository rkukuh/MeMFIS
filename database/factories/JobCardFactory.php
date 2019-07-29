<?php

use App\Models\Status;
use App\Models\JobCard;
use App\Models\TaskCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Employee;
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
        'quotation_id' => Quotation::get()->random()->id,
        'taskcard_id' => $taskcard->id,
        
        'origin_quotation' => null,
        'origin_taskcard' => $taskcard->toJson(),
        'origin_taskcard_items' => $taskcard->items->toJson(),
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