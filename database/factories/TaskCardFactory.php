<?php

use App\Models\Type;
use App\Models\TaskCard;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    return [
        'title' => 'TaskCard Dummy #' . $faker->unixTime(),
        'type_id' => Type::ofTaskCard()->get()->random()->id,
        'otr_certification_id' => null, // TODO: Refactor its entity name
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'zone' => null,
        'access' => null,
        'is_rii' => $faker->boolean,
        'applicability_airplane' => '', // TODO: Refactor to M-M polymorph
        'applicability_engine' => '', // TODO: Refactor to M-M polymorph
        'is_applicability_engine_all' => $faker->boolean,
        'source' => null,
        'effectivity' => null,
    ];

});

/** Callbacks */

$factory->afterCreating(TaskCard::class, function ($category, $faker) {
    if ($faker->boolean) {
        $category->descriptions()->save(factory(Description::class)->make());
    }
});
