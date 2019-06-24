<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\HtCrr;
use App\Models\Status;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Progress;
use Faker\Generator as Faker;

$factory->define(HtCrr::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'code' => 'HTCRR-DUM-' . $number,
        'part_number' => 'P/N-' . $faker->randomNumber,
        'project_id' => Project::get()->random()->id,
        'is_rii' => $faker->boolean,
        'estimation_manhour' => $faker->randomElement([null, $faker->randomFloat(2, 0, 9999)]),
        'removed_at' => Carbon::now()->subWeeks(rand(1, 3)),
        'removed_by' => Employee::get()->random()->id,
        'removal_manhour_estimation' => $faker->randomElement([null, $faker->randomFloat(2, 0, 9999)]),
        'installed_at' => Carbon::now()->addWeeks(rand(1, 3)),
        'installed_by' => Employee::get()->random()->id,
        'installation_manhour_estimation' => $faker->randomElement([null, $faker->randomFloat(2, 0, 9999)]),
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(HtCrr::class, function ($htcrr, $faker) {

    // Progress

    $htcrr->progresses()->save(
        factory(Progress::class)->make([
            // Set all progress to 'open' to make testing phase easier
            'status_id' => Status::ofHtCrr()->where('code', 'removal-open')->first()
        ])
    );

    // SKill

    for ($i = 1; $i <= rand(1, 3); $i++) {
        if (Type::ofTaskCardSkill()->count()) {
            $skill = Type::ofTaskCardSkill()->get()->random();
        }
        else {
            $skill = factory(Type::class)->states('taskcard-skill')->create();
        }

        $htcrr->skills()->attach($skill);
    }

});
