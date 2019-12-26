<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesOfItem::class);
        $this->call(CategoriesOfPurchaseRequest::class);
        $this->call(CategoriesOfTaskCardEO::class);
    }
}
