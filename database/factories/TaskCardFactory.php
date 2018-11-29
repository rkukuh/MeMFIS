<?php

use App\Models\Type;
use App\Models\TaskCard;
use App\Models\Description;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    return [
        'title' => 'TaskCard Dummy #' . $faker->unixTime(),
        'type_id' => Type::ofTaskCard()->get()->random()->id,
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'zone' => 'Zone Dummy #' . $faker->unixTime(),
        'access' => 'Access Dummy #' . $faker->unixTime(),
        'is_rii' => $faker->boolean,
        'is_applicability_engine_all' => $faker->boolean,
        'source' => null,
        'effectivity' => null,

        // 'otr_certification_id' => null, // TODO: Refactor its entity name
        // 'applicability_aircraft' => '', // TODO: Refactor to M-M polymorph
        // 'applicability_engine' => '', // TODO: Refactor to M-M polymorph
    ];

});

/** Callbacks */

$factory->afterCreating(TaskCard::class, function ($category, $faker) {
    if ($faker->boolean) {
        $category->descriptions()->save(factory(Description::class)->make());
    }
});
