<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class TestsTableSeeder extends CsvSeeder
{
    /**
     * Documentation https://github.com/Flynsarmy/laravel-csv-seeder
     */
    public function __construct()
	{
		$this->table    = 'tests';
		$this->filename = base_path().'/database/seeds/imports/test.csv';
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
