<?php

use App\Models\Fax;
use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Fax::class, function (Faker $faker) {

    return [
        'number' => $faker->phoneNumber,
        'type_id' => function () {
            if (Type::ofFax()->count()) {
                return Type::ofFax()->get()->random()->id;
            }

            return factory(Type::class)->states('fax')->create()->id;
        },
        'is_active' => $faker->boolean,
    ];

});
