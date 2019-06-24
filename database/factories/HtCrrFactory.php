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
        'type_id' => function () use ($faker) {
            if (Type::ofHtCrrType()->count()) {
                return Type::ofHtCrrType()->get()->random()->id;
            }
            
            return factory(Type::class)->states('htcrr-type')->create()->id;
        },
        'project_id' => function () use ($faker) {
            if (Project::count()) {
                return Project::get()->random()->id;
            }
            
            return factory(Project::class)->create()->id;
        },
        'position' => 'Pos-' . ucfirst($faker->word),
        'serial_number' => 'S/N-' . $faker->randomNumber,
        'part_number' => 'P/N-' . $faker->randomNumber,
        'conducted_at' => Carbon::now()->subWeeks(rand(1, 3)),
        'conducted_by' => Employee::get()->random()->id,
        'estimation_manhour' => $faker->randomElement([null, $faker->randomFloat(2, 0, 9999)]),
        'is_rii' => $faker->boolean,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** CALLBACKS */

$factory->afterCreating(HtCrr::class, function ($htcrr, $faker) {

    // Progress

    $htcrr->progresses()->save(
        factory(Progress::class)->make([
            // Set all progress to 'open' to make testing phase easier
            'status_id' => Status::ofHtCrr()->where('code', 'open')->first()
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