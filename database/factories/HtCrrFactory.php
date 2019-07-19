<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Item;
use App\Models\Unit;
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
        'parent_id' => null,
        'type_id' => Type::ofHtCrrType()->where('name', 'parent')->first()->id,
        'project_id' => function () use ($faker) {
            if (Project::count()) {
                return Project::get()->random()->id;
            }
            
            return factory(Project::class)->create()->id;
        },
        'position' => 'Pos-' . ucfirst($faker->word),
        'serial_number' => null,
        'part_number' => null,
        'conducted_at' => null,
        'conducted_by' => null,
        'estimation_manhour' => 0,
        'is_rii' => false,
        'description' => $faker->randomElement([null, $faker->text]),
    ];

});

/** STATES */

$factory->state(HtCrr::class, 'removal', function ($faker) {

    return [
        'type_id' => Type::ofHtCrrType()->where('name', 'removal')->first()->id,
        'serial_number' => 'S/N-' . $faker->randomNumber,
        'part_number' => 'P/N-' . $faker->randomNumber,
        'conducted_at' => Carbon::now()->subWeeks(rand(1, 3)),
        'conducted_by' => Employee::get()->random()->id,
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'is_rii' => $faker->boolean,
    ];

});

$factory->state(HtCrr::class, 'installation', function ($faker) {

    return [
        'type_id' => Type::ofHtCrrType()->where('name', 'installation')->first()->id,
        'serial_number' => 'S/N-' . $faker->randomNumber,
        'part_number' => 'P/N-' . $faker->randomNumber,
        'conducted_at' => Carbon::now()->subWeeks(rand(1, 3)),
        'conducted_by' => Employee::get()->random()->id,
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'is_rii' => $faker->boolean,
    ];

});

/** CALLBACKS */

$factory->afterCreating(HtCrr::class, function ($htcrr, $faker) {

    // Helper (Employee)

    for ($i = 0; $i < rand(1, 3); $i++) {
        $htcrr->helpers()->save(Employee::get()->random());
    }

    // Item

    if ($faker->boolean) {
        $item = null;

        for ($i = 1; $i <= rand(5, 10); $i++) {
            if (Item::count()) {
                $item = Item::get()->random();
            } else {
                $item = factory(Item::class)->create();
            }

            if (Unit::count()) {
                $unit = Unit::get()->random();
            } else {
                $unit = factory(Unit::class)->create();
            }

            $htcrr->items()->save($item, [
                'quantity' => rand(1, 10),
                'unit_id' => $unit->id,
                'note' => $faker->randomElement([null, $faker->sentence]),
            ]);
        }
    }

    // Progress

    $htcrr->progresses()->save(
        factory(Progress::class)->make([
            // Set all progress to 'open' to make testing phase easier
            'status_id' => Status::ofHtCrr()->where('code', 'removal-open')->first()
        ])
    );

    // Skill

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
