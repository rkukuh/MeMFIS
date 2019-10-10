<?php

use App\Models\Bank;
use Illuminate\Database\Seeder;

class Banks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bank::class, config('memfis.dummies.banks'))->create();
    }
}
