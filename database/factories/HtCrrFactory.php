<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\HtCrr;
use App\Models\Project;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(HtCrr::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'HTCRR-DUM-' . $number,
        'part_number' => 'P/N-' . $faker->randomNumber,
        'project_id' => Project::get()->random()->id,
        'skill_id' => Type::ofTaskCardSkill()->get()->random()->id,
        'is_rii' => $faker->boolean,
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'removed_at' => Carbon::now()->subWeeks(rand(1, 3)),
        'removed_by' => Employee::get()->random()->id,
        'installed_at' => Carbon::now()->addWeeks(rand(1, 3)),
        'installed_by' => Employee::get()->random()->id,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});
