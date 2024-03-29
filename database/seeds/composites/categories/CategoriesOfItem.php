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
            'code' => 'raw',
            'name' => 'Raw Material',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'cons',
            'name' => 'Consumable',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'comp',
            'name' => 'Component',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'tool',
            'name' => 'Tool',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'service',
            'name' => 'Service',
            'of' => 'item',
        ]);

        Category::create([
            'code' => 'facility',
            'name' => 'Facility',
            'of' => 'item',
        ]);

    }
}
