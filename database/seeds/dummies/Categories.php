<?php

use App\Models\Category;
use App\Models\Description;
use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, config('memfis.examples.categories'))->create();
    }
}
