<?php

use App\Models\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'TYP-DUM-' . $number,
        'name' => 'Type Dummy #' . $number,
        'of'   => $faker->randomElement([
            'arc',
            'fax',
            'unit',
            'phone',
            'email',
            'journal',
            'address',
            'website',
            'project',
            'document',
            'regulator',
            'work-area',
            'capability',
            'htcrr-type',
            'eligibility',
            'school-degree',
            'taskcard-task',
            'taskcard-skill',
            'aviation-degree',
            'purchase-request',
            'scheduled-payment',
            'maintenance-cycle',
            'htcrr-pause-reason',
            'htcrr-close-reason',
            'jobcard-pause-reason',
            'jobcard-close-reason',
            'taskcard-type-routine',
            'defectcard-pause-reason',
            'defectcard-close-reason',
            'taskcard-type-non-routine',
            'project-workpackage-manhour',
            'defectcard-propose-correction',
        ]),
    ];

});

$factory->state(Type::class, 'arc', ['of' => 'arc']);
$factory->state(Type::class, 'fax', ['of' => 'fax']);
$factory->state(Type::class, 'unit', ['of' => 'unit']);
$factory->state(Type::class, 'phone', ['of' => 'phone']);
$factory->state(Type::class, 'email', ['of' => 'email']);
$factory->state(Type::class, 'journal', ['of' => 'journal']);
$factory->state(Type::class, 'address', ['of' => 'address']);
$factory->state(Type::class, 'website', ['of' => 'website']);
$factory->state(Type::class, 'project', ['of' => 'project']);
$factory->state(Type::class, 'document', ['of' => 'document']);
$factory->state(Type::class, 'regulator', ['of' => 'regulator']);
$factory->state(Type::class, 'work-area', ['of' => 'work-area']);
$factory->state(Type::class, 'capability', ['of' => 'capability']);
$factory->state(Type::class, 'htcrr-type', ['of' => 'htcrr-type']);
$factory->state(Type::class, 'eligibility', ['of' => 'eligibility']);
$factory->state(Type::class, 'school-degree', ['of' => 'school-degree']);
$factory->state(Type::class, 'taskcard-task', ['of' => 'taskcard-task']);
$factory->state(Type::class, 'taskcard-skill', ['of' => 'taskcard-skill']);
$factory->state(Type::class, 'aviation-degree', ['of' => 'aviation-degree']);
$factory->state(Type::class, 'purchase-request', ['of' => 'purchase-request']);
$factory->state(Type::class, 'scheduled-payment', ['of' => 'scheduled-payment']);
$factory->state(Type::class, 'maintenance-cycle', ['of' => 'maintenance-cycle']);
$factory->state(Type::class, 'htcrr-pause-reason', ['of' => 'htcrr-pause-reason']);
$factory->state(Type::class, 'htcrr-close-reason', ['of' => 'htcrr-close-reason']);
$factory->state(Type::class, 'jobcard-pause-reason', ['of' => 'jobcard-pause-reason']);
$factory->state(Type::class, 'jobcard-close-reason', ['of' => 'jobcard-close-reason']);
$factory->state(Type::class, 'taskcard-type-routine', ['of' => 'taskcard-type-routine']);
$factory->state(Type::class, 'defectcard-pause-reason', ['of' => 'defectcard-pause-reason']);
$factory->state(Type::class, 'defectcard-close-reason', ['of' => 'defectcard-close-reason']);
$factory->state(Type::class, 'taskcard-type-non-routine', ['of' => 'taskcard-type-non-routine']);
$factory->state(Type::class, 'project-workpackage-manhour', ['of' => 'project-workpackage-manhour']);
$factory->state(Type::class, 'defectcard-propose-correction', ['of' => 'defectcard-propose-correction']);
