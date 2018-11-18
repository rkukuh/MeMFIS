<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

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
            'code' => 'component',
            'name' => 'Component',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'tool',
            'name' => 'Tools',
            'of' => 'item',
        ]);
    }
}
