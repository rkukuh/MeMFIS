<?php

use App\Models\TaskCard;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    return [
        'title' => '',
        'type_id' => '',
        'otr_certification_id' => '',
        'work_area' => '',
        'zone' => '',
        'access' => '',
        'is_rii' => '',
        'applicability_airplane' => '',
        'applicability_engine' => '',
        'is_applicability_engine_all' => '',
        'source' => '',
        'effectivity' => '',
    ];

});

/** Callbacks */

$factory->afterCreating(TaskCard::class, function ($category, $faker) {
    if ($faker->boolean) {
        $category->descriptions()->save(factory(Description::class)->make());
    }
});
