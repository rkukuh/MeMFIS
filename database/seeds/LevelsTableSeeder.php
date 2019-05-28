<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LevelsOfCustomer::class);
        $this->call(LevelsOfLanguage::class);
        $this->call(LevelsOfOTR::class);
    }
}
