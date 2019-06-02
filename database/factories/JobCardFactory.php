<?php

use App\Models\JobCard;
use App\Models\TaskCard;
use App\Models\Quotation;
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
