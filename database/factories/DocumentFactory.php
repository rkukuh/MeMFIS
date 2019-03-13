<?php

use App\Models\Type;
use App\Models\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {

    return [
        'number'  => 'DOC-DUM-' . $faker->unixTime(),
        'type_id' => function () {
            if (Type::ofDocument()->count()) {
                return Type::ofDocument()->get()->random()->id;
            }

            return factory(Type::class)->states('document')->create()->id;
        },
    ];

});
