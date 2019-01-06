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
    public function requires_a_code()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Category::class)->raw(['code' => null]);

        $this->post(route('admin.category.store'), $data)->assertSessionHasErrors('code');
    }
}
