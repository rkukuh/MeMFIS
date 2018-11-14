<?php

use App\Models\Fax;
use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Fax::class, function (Faker $faker) {

    return [
        'number' => $faker->phoneNumber,
        'type_id' => Type::ofFax()->get()->random()->id,
        'is_primary' => $faker->boolean,
    ];

});
