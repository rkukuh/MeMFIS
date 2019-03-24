<?php

use App\Models\Type;
use App\Models\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {

    return [
        'address' => $faker->companyEmail,
        'type_id' => function () {
            if (Type::ofEmail()->count()) {
                return Type::ofEmail()->get()->random()->id;
            }

            return factory(Type::class)->states('email')->create()->id;
        },
        'is_active' => $faker->boolean,
    ];

});
