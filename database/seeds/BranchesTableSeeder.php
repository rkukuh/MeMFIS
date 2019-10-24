<?php

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\Company;
use App\Helpers\DocumentNumber;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'code' => DocumentNumber::generate('Branch-', Branch::withTrashed()->count() + 1),
            'name' => 'Branch 1 ',
            'company_id' => Company::where('code', 'mmf')->first()->id,
        ]);
    }
}
