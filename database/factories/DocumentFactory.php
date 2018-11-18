<?php

use App\Models\Type;
use App\Models\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {

    return [
        'number'  => 'DOC-' . $faker->unixTime(),
        'type_id' => Type::ofDocument()->get()->random()->id,
    ];

});
