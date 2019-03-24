<?php

use App\Models\Type;
use App\Models\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {

    return [
        'number' => $faker->phoneNumber,
        'type_id' => function () {
            if (Type::ofPhone()->count()) {
                return Type::ofPhone()->get()->random()->id;
            }

            return factory(Type::class)->states('phone')->create()->id;
        },
        'is_active' => $faker->boolean,
    ];

});
