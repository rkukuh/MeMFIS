<?php

use App\Models\Type;
use App\Models\Journal;
use Faker\Generator as Faker;

$factory->define(Journal::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'JR-DUM-' . $sequence,
        'name' => 'Journal Dummy #' . $sequence,
        'type_id' => function () {
            if (Type::ofJournal()->count()) {
                return Type::ofJournal()->get()->random()->id;
            }

            return factory(Type::class)->states('journal')->create()->id;
        },
        'level' => 1,
    ];

});
