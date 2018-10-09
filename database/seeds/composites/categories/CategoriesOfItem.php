<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesOfItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'code' => 'material',
            'name' => 'Materials',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'tool',
            'name' => 'Tools',
            'of' => 'item',
        ]);
    }
}
