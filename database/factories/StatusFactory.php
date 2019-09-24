<?php

use App\Models\Status;
use Faker\Generator as Faker;

$factory->define(Status::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'STS-DUM-' . $number,
        'name' => 'Status Dummy #' . $number,
        'of'   => $faker->randomElement([
            'htcrr',
            'marital',
            'jobcard',
            'project',
            'quotation',
            'employment',
            'defectcard',
            'customer-component-repair',
            'attendance'
        ])
    ];

});

$factory->state(Status::class, 'htcrr', ['of' => 'htcrr']);
$factory->state(Status::class, 'marital', ['of' => 'marital']);
$factory->state(Status::class, 'jobcard', ['of' => 'jobcard']);
$factory->state(Status::class, 'project', ['of' => 'project']);
$factory->state(Status::class, 'quotation', ['of' => 'quotation']);
$factory->state(Status::class, 'employment', ['of' => 'employment']);
$factory->state(Status::class, 'defecetcard', ['of' => 'defecetcard']);
$factory->state(Status::class, 'customer-component-repair', ['of' => 'customer-component-repair']);
$factory->state(Status::class, 'attendance', ['of' => 'attendance']);
