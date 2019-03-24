<?php

use App\Models\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'STS-DUM-' . $number,
        'name' => 'Status Dummy #' . $number,
        'of'   => $faker->randomElement([
            'marital',
            'employment',
            'customer-component-repair',
        ])
    ];

});

$factory->state(Status::class, 'marital', ['of' => 'marital']);
$factory->state(Status::class, 'employment', ['of' => 'employment']);
$factory->state(Status::class, 'customer-component-repair', ['of' => 'customer-component-repair']);
