<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class Companies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class, config('memfis.dummies.companies'))->create();
    }
}
