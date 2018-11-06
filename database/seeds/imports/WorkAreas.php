<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class WorkAreas extends CsvSeeder
{
    public function __construct()
	{
        $this->table = 'types';
        $this->filename = base_path() . '/database/seeds/imports/work-areas.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
    }
}
