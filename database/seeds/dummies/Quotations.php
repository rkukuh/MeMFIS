<?php

use App\Models\Quotation;
use Illuminate\Database\Seeder;

class Quotations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Quotation::class, config('memfis.dummies.quotations'))->create();
    }
}
