<?php

namespace Tests\Unit\Frontend;

use App\User;
use Tests\TestCase;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManufacturerTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** ATTRIBUTES */

    /** @test */
    public function requires_a_uuid()
    {
        $this->actingAs(factory(User::class)->create());

        $manufacturer = factory(Manufacturer::class)->create();

        $this->assertDatabaseHas('manufacturers', ['uuid' => $manufacturer->uuid]);
    }

    /** @test */
    public function requires_a_code()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Manufacturer::class)->raw(['code' => null]);

        $this->post(route('frontend.manufacturer.store'), $data)
             ->assertJsonValidationErrors('code');
    }

    /** @test */
    public function requires_a_name()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Manufacturer::class)->raw(['name' => null]);

        $this->post(route('frontend.manufacturer.store'), $data)
             ->assertJsonValidationErrors('name');
    }
}
