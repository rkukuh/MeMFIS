<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Repeat;
use App\Models\Category;
use App\Models\TaskCard;
use App\Models\Aircraft;
use App\Models\Threshold;
use App\Models\EOInstruction;
use Faker\Generator as Faker;

$factory->define(TaskCard::class, function (Faker $faker) {

    $number = $faker->unixTime();

    return [
        'number' => $number,
        'title' => 'TaskCard Dummy #' . $number,
        'type_id' => function () use ($faker) {
            if (Type::ofTaskCardTypeRoutine()->count()
                || Type::ofTaskCardTypeNonRoutine()->count())
            {
                return $faker->randomElement([
                    Type::ofTaskCardTypeRoutine()->get()->random()->id,
                    Type::ofTaskCardTypeNonRoutine()->get()->random()->id,
                ]);
            }

            return $faker->randomElement([
                factory(Type::class)->states('taskcard-type-routine')->create()->id,
                factory(Type::class)->states('taskcard-type-non-routine')->create()->id,
            ]);
        },
        'task_id' => function () {
            if (Type::ofTaskCardTask()->count()) {
                return Type::ofTaskCardTask()->get()->random()->id;
            }

            return factory(Type::class)->states('taskcard-task')->create()->id;
        },
        'work_area' => function () {
            if (Type::ofWorkArea()->count()) {
                return Type::ofWorkArea()->get()->random()->id;
            }

            return factory(Type::class)->states('work-area')->create()->id;
        },
        'estimation_manhour' => $faker->randomFloat(2, 0, 9999),
        'engineer_quantity' => rand(1, 10),
        'helper_quantity' => $faker->randomElement([null, rand(1, 5)]),
        'is_rii' => $faker->boolean,
        'source' => null,
        'effectivity' => null,
        'performance_factor' => $faker->randomElement([
            null,
            (float)(rand(1, 5) * 0.5) // min:1-max:unlimited-step:0,1-eg:1;1,5;2;
        ]),
        'sequence' => $faker->randomElement([null, rand(1, 10)]),
        'stringer' => function () use ($faker) {
            $stringers = [];

            for ($i = 0; $i < rand(2, 5); $i++) {
                $stringers[] = $faker->numberBetween(100, 999);
            }

            return $faker->randomElement([null, json_encode($stringers)]);
        },
        'version' => function () use ($faker) {
            $versions = [];

            for ($i = 0; $i < rand(2, 5); $i++) {
                $versions[] = rand(1, 9) . '.' . rand(1, 9);
            }

            return $faker->randomElement([null, json_encode($versions)]);
        },
        'ata' => null,
        'description' => $faker->paragraph(rand(10, 20)),
        'additionals' => function () use ($faker) {
            $additionals = [
                'internal_number' => 'TC-INT-DUM-' . $faker->unixTime()
            ];

            return $faker->randomElement([null, json_encode($additionals)]);
        }

        // 'otr_certification_id' => null,  // TODO: Refactor its entity name
    ];

});

/** STATES */

$factory->state(TaskCard::class, 'basic', function ($faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'TC-BSC-DUM-' . $number,
        'title' => 'TaskCard Basic Dummy #' . $number,
        'type_id' => Type::ofTaskCardTypeRoutine()->get()->random()->id,
    ];

});

$factory->state(TaskCard::class, 'eo', function ($faker) {

    $number = $faker->unixTime();

    $scheduled_priority = Type::ofTaskCardEOScheduledPriority()->get()->random();
    $scheduled_priority_type = $faker->randomElement(['date', 'hours', 'cycle']);
    $recurrence = Type::ofTaskCardEORecurrence()->get()->random();
    $manual_affected = Type::ofTaskCardEOManualAffected()->get()->random();

    return [
        // EO Header attributes
        'number' => 'TC-EO-DUM-' . $number,
        'title' => 'Engineering Order Dummy #' . $number,
        'type_id' => function () {
            if (Type::ofTaskCardTypeNonRoutine()->count()) {
                return Type::ofTaskCardTypeNonRoutine()->get()->random()->id;
            }

            return factory(Type::class)->states('taskcard-type-non-routine')->create()->id;
        },
        'revision' => rand(1, 10),
        'reference' => 'REF-' . $number,
        'category_id' => function () {
            if (Category::ofTaskCardEO()->count()) {
                return Category::ofTaskCardEO()->get()->random()->id;
            }

            return factory(Category::class)->states('taskcard-eo')->create()->id;
        },
        'scheduled_priority_id' => $scheduled_priority->id,
        'scheduled_priority_text' => function () use ($scheduled_priority, $scheduled_priority_type) {
            if ($scheduled_priority->code == 'prior-to') {
                if ($scheduled_priority_type == 'date') {
                    return Carbon::now();
                }

                return rand(1, 10);
            } else {
                return null;
            }
        },
        'scheduled_priority_type' => function () use ($scheduled_priority, $scheduled_priority_type) {
            if ($scheduled_priority->code == 'prior-to') {
                return $scheduled_priority_type;
            } else {
                return null;
            }
        },
        'recurrence_id' => $recurrence->id,
        'recurrence_amount' => function () use ($recurrence) {
            if ($recurrence->code == 'repetitive') {
                return rand(1, 10);
            } else {
                return null;
            }
        },
        'recurrence_type' => function () use ($recurrence, $faker) {
            if ($recurrence->code == 'repetitive') {
                return $faker->randomElement(['cycle', 'hourly', 'daily', 'monthly', 'yearly']);
            } else {
                return null;
            }
        },
        'manual_affected_id' => $manual_affected->id,
        'manual_affected_text' => function () use ($manual_affected, $faker) {
            if ($manual_affected->code == 'other') {
                return $faker->text;
            } else {
                return null;
            }
        },

        // These attributes are filled on 'taskcard_eo' table
        'work_area' => null,
        'estimation_manhour' => null,
        'engineer_quantity' => null,
        'helper_quantity' => null,
        'is_rii' => null,
        'performance_factor' => null,
        'sequence' => null,
        'version' => null,
        'description' => null,
    ];

});

$factory->state(TaskCard::class, 'si', function ($faker) {

    $number = $faker->unixTime();

    return [
        'number' => 'TC-SI-DUM-' . $number,
        'title' => 'Special Instruction Dummy #' . $number,
        'type_id' => function () {
            if (Type::ofTaskCardTypeNonRoutine()->count()) {
                return Type::ofTaskCardTypeNonRoutine()->get()->random()->id;
            }

            return factory(Type::class)->states('taskcard-type-non-routine')->create()->id;
        },
        'performance_factor' => null,
        'version' => null,
    ];

});

/** CALLBACKS for General */

$factory->afterCreating(TaskCard::class, function ($taskcard, $faker) {

    // Aircraft

    $aircraft = null;

    if (Aircraft::count()) {
        $aircraft = Aircraft::get()->random();
    } else {
        $aircraft = factory(Aircraft::class)->create();
    }

    $taskcard->aircrafts()->save($aircraft);

    // Aircraft's Access

    if ($faker->boolean) {
        $taskcard->accesses()->saveMany($aircraft->accesses);
    }

    // Aircraft's Zone

    if ($faker->boolean) {
        $taskcard->zones()->saveMany($aircraft->zones);
    }

    // Aircraft's Station

    if ($faker->boolean) {
        $taskcard->stations()->saveMany($aircraft->stations);
    }

});

/** CALLBACKS for States */

$factory->afterCreatingState(TaskCard::class, 'basic', function ($taskcard, $faker) {

    // Item

    for ($i = 1; $i <= rand(2, 5); $i++) {
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

        $taskcard->items()->attach($item, [
            'quantity' => rand(1, 10),
            'unit_id' => $unit->id,
        ]);
    }

    // Related-to

    if ($faker->boolean) {
        $taskcard->related_to()->saveMany(TaskCard::get()->random(rand(1, 3)));
    }

    // SKill

    for ($i = 1; $i <= rand(1, 3); $i++) {
        if (Type::ofTaskCardSkill()->count()) {
            $skill = Type::ofTaskCardSkill()->get()->random();
        }
        else {
            $skill = factory(Type::class)->states('taskcard-skill')->create();
        }
    
        $taskcard->skills()->attach($skill);
    }

    // Threshold and Repeat

    if ($faker->boolean) {
        $taskcard->thresholds()->saveMany(
            factory(Threshold::class, rand(1, 2))->make()
        );

        $taskcard->repeats()->saveMany(
            factory(Repeat::class, rand(1, 2))->make()
        );
    }

});

$factory->afterCreatingState(TaskCard::class, 'eo', function ($taskcard, $faker) {

    $taskcard->eo_instructions()->saveMany(
        factory(EOInstruction::class, rand(5, 10))->make()
    );

    foreach ($taskcard->eo_instructions as $eo_instruction) {
        for ($i = 1; $i <= rand(2, 5); $i++) {
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

            $eo_instruction->items()->attach($item, [
                'quantity' => rand(1, 10),
                'unit_id' => $unit->id,
            ]);
        }
    }

});

$factory->afterCreatingState(TaskCard::class, 'si', function ($taskcard, $faker) {

    // Item

    for ($i = 1; $i <= rand(2, 5); $i++) {
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

        $taskcard->items()->attach($item, [
            'quantity' => rand(1, 10),
            'unit_id' => $unit->id,
        ]);
    }

    // SKill

    for ($i = 1; $i <= rand(1, 3); $i++) {
        if (Type::ofTaskCardSkill()->count()) {
            $skill = Type::ofTaskCardSkill()->get()->random();
        }
        else {
            $skill = factory(Type::class)->states('taskcard-skill')->create();
        }
    
        $taskcard->skills()->attach($skill);
    }

});
