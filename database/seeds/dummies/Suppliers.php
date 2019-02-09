<?php

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class Suppliers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Supplier::class, config('memfis.dummies.suppliers'))->create();
    }
}
