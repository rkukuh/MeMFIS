<?php

use App\Models\Type;
use App\Models\Website;
use Faker\Generator as Faker;

$factory->define(Website::class, function (Faker $faker) {

    return [
        'url' => $faker->url,
        'type_id' => function () {
            if (Type::ofWebsite()->count()) {
                return Type::ofWebsite()->get()->random()->id;
            }

            return factory(Type::class)->states('website')->create()->id;
        },
    ];

});
