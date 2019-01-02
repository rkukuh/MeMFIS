<?php

use App\Models\Type;
use App\Models\Version;
use App\Models\TaskCard;
use App\Models\Description;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => $number,
        'title' => 'TaskCard Dummy #' . $number,
        'type_id' => Type::ofTaskCardType()->get()->random()->id,
        'task_type_id' => Type::ofTaskCardTask()->get()->random()->id,
        'work_area' => Type::ofWorkArea()->get()->random()->id,
        'zone' => 'Zone Dummy #' . $faker->unixTime(),
        'access' => 'Access Dummy #' . $faker->unixTime(),
        'is_rii' => $faker->boolean,
        'source' => null,
        'effectivity' => null,
        'description' => $faker->paragraph(rand(10, 20))

        // 'otr_certification_id' => null,  // TODO: Refactor its entity name
    ];

});

/** Callbacks */

$factory->afterCreating(TaskCard::class, function ($taskcard, $faker) {
    if ($faker->boolean) {
        $taskcard->versions()->saveMany(factory(Version::class, rand(2, 4))->make());
    }
});
