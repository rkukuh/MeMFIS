<?php

use App\Models\Benefit;
use Illuminate\Database\Seeder;

class Benefits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Benefit::class, config('memfis.dummies.benefits'))->create();
    }
}
