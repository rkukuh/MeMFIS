<?php

namespace Tests\Unit\Frontend\TaskCard;

use App\User;
use Tests\TestCase;
use App\Models\TaskCard;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskCardTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** ATTRIBUTES */

    /** @test */
    public function requires_a_uuid()
    {
        $this->actingAs(factory(User::class)->create());

        $taskcard = factory(TaskCard::class)->create();

        $this->assertDatabaseHas('taskcards', ['uuid' => $taskcard->uuid]);
    }

    /** @test */
    public function requires_a_number()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(TaskCard::class)->raw(['number' => null]);

        $this->post(route('frontend.taskcard.store'), $data)
             ->assertJsonValidationErrors('number');
    }

    /** @test */
    public function requires_a_title()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(TaskCard::class)->raw(['title' => null]);

        $this->post(route('frontend.taskcard.store'), $data)
             ->assertJsonValidationErrors('title');
    }

    // TODO: Requires a Type, must be one of 'taskcard-type-routine' or 'taskcard-type-non-routine'
    // TODO: Requires a Task type, must be one of 'taskcard-task'
    // TODO: Requires a Skill, must be one of ?
}
