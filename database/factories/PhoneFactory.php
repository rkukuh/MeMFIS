<?php

use App\Models\Type;
use App\Models\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {

    return [
        'number' => $faker->phoneNumber,
        'type_id' => Type::ofPhone()->get()->random()->id,
        'is_active' => $faker->boolean,
    ];

});
