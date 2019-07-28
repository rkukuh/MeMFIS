<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class)->create([
            'code' => 'mmf',
            'name' => 'PT. Merpati Training Center']
        );
    }
}
