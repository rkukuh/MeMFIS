<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class Languages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Language::class, config('memfis.dummies.languages'))->create();
    }
}
