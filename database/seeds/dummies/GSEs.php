<?php

use App\Models\GSE;
use Illuminate\Database\Seeder;

class GSEs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GSE::class, config('memfis.dummies.gse'))->create();
    }
}
