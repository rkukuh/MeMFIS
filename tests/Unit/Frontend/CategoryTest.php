<?php

namespace Tests\Unit\Frontend;

use App\User;
use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** ATTRIBUTES */

    /** @test */
    public function requires_a_uuid()
    {
        $this->actingAs(factory(User::class)->create());

        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', ['uuid' => $category->uuid]);
    }
}
