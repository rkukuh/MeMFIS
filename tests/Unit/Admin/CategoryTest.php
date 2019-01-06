<?php

namespace Tests\Unit\Admin;

use App\User;
use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function requires_a_uuid()
    {
        $this->actingAs(factory(User::class)->create());

        $category = factory(Category::class)->create();

        $this->assertDatabaseHas('categories', ['uuid' => $category->uuid]);
    }

    /** @test */
    public function requires_a_code()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Category::class)->raw(['code' => null]);

        $this->post(route('admin.category.store'), $data)->assertSessionHasErrors('code');
    }

    /** @test */
    public function requires_a_name()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Category::class)->raw(['name' => null]);

        $this->post(route('admin.category.store'), $data)->assertSessionHasErrors('name');
    }

    /** @test */
    public function requires_an_of()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Category::class)->raw(['of' => null]);

        $this->post(route('admin.category.store'), $data)->assertSessionHasErrors('of');
    }
}
