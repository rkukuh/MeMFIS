<?php

use Illuminate\Database\Seeder;

class ImportDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WorkAreas::class);
    }
}
