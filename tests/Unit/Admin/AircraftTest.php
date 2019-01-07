<?php

namespace Tests\Unit\Admin;

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

        $this->post(route('admin.aircraft.store'), $data)->assertSessionHasErrors('code');
    }
}
