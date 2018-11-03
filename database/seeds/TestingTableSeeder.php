<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class TestingTableSeeder extends CsvSeeder
{
    /**
     * Documentation https://github.com/Flynsarmy/laravel-csv-seeder
     */
    public function __construct()
	{
		$this->table = 'testings';
		$this->filename = base_path().'/database/seeds/csvs/test.csv';
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		DB::table($this->table)->truncate();

		parent::run();
    }
}
