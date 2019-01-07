<?php

namespace Tests\Unit\Frontend;

use App\User;
use Tests\TestCase;
use App\Models\Aircraft;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AircraftTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** ATTRIBUTES */

    /** @test */
    public function requires_a_uuid()
    {
        $this->actingAs(factory(User::class)->create());

        $aircraft = factory(Aircraft::class)->create();

        $this->assertDatabaseHas('aircrafts', ['uuid' => $aircraft->uuid]);
    }

    /** @test */
    public function requires_a_code()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Aircraft::class)->raw(['code' => null]);

        $this->post(route('frontend.aircraft.store'), $data)
             ->assertJsonValidationErrors('code');
    }

    /** @test */
    public function requires_a_name()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Aircraft::class)->raw(['name' => null]);

        $this->post(route('frontend.aircraft.store'), $data)
             ->assertJsonValidationErrors('name');
    }
}
