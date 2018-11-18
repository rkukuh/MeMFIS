<?php

use App\Models\Type;
use App\Models\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {

    return [
        'address' => $faker->companyEmail,
        'type_id' => Type::ofEmail()->get()->random()->id,
        'is_active' => $faker->boolean,
    ];

});
