<?php

use App\Models\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {

    return [
        'number'  => $faker->ssn,
        'type_id' => Type::ofDocument()->get()->random()->id,
    ];

});
