<?php

use App\Models\Type;
use App\Models\Website;
use Faker\Generator as Faker;

$factory->define(Website::class, function (Faker $faker) {

    return [
        'url' => $faker->url,
        'type_id' => Type::ofWebsite()->get()->random()->id,
    ];

});
