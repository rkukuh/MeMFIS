<?php

namespace Tests\Unit\Frontend;

use App\User;
use Tests\TestCase;
use App\Models\Aircraft;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Manufacturer;

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

    /** @test */
    public function requires_a_manufacturer()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Aircraft::class)->raw(['manufacturer_id' => null]);

        $this->post(route('frontend.aircraft.store'), $data)
             ->assertJsonValidationErrors('manufacturer_id');
    }

    /** @test */
    public function manufacturer_must_be_an_instance_of_manufacturer()
    {
        $this->actingAs(factory(User::class)->create());

        $manufacturer = factory(Manufacturer::class)->create();

        $data = factory(Aircraft::class)->create([
            'manufacturer_id' => $manufacturer->id
            ]);

        $this->assertInstanceOf(Manufacturer::class, $manufacturer);
        $this->assertDatabaseHas('aircrafts', ['manufacturer_id' => $data->manufacturer_id]);
    }
}
