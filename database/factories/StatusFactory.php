<?php

use App\models\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {

    return [
        'name' => 'Status #' . $faker->unixTime(),
        'of'   => $faker->randomElement([
            'marital',
            'employment',
        ])
    ];

});

$factory->state(Status::class, 'marital', ['of' => 'marital']);
$factory->state(Status::class, 'employment', ['of' => 'employment']);
