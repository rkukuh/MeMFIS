<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesOfPurchaseRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'code' => 'general',
            'name' => 'General',
            'of'   => 'purchase-request',
        ]);

        Category::create([
            'code' => 'service',
            'name' => 'Service',
            'of'   => 'purchase-request',
        ]);


    }
}

