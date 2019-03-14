<?php

use App\Models\Type;
use App\Models\License;
use Faker\Generator as Faker;

$factory->define(License::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'LC-DUM-' . $number,
        'name' => 'License Dummy #' . $number,
        'regulator' => function () {
            if (Type::ofRegulator()->count()) {
                return Type::ofRegulator()->get()->random()->id;
            }

            return factory(Type::class)->states('regulator')->create()->id;
        },
    ];

});
