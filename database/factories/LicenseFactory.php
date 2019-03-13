<?php

use App\Models\Type;
use App\Models\License;
use Faker\Generator as Faker;

$factory->define(License::class, function (Faker $faker) {

    $sequence = $faker->unixTime();

    return [
        'code' => 'LC-DUM-' . $sequence,
        'name' => 'License Dummy #' . $sequence,
        'regulator' => function () {
            if (Type::ofRegulator()->count()) {
                return Type::ofRegulator()->get()->random()->id;
            }

            return factory(Type::class)->states('regulator')->create()->id;
        },
    ];

});
