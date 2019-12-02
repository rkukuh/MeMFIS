<?php

use App\Models\Type;
use App\Models\Department;
use Illuminate\Database\Seeder;

class CompanyStructureExamples extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'code' => 'HO',
            'company_id' => 'PT. Merpati Maintenance Facility',
            'parent_id' => 'code',
            'type_id' => Type::ofCompany()->where('code', 'HOF001'),
            'name' => 'PT. Merpati Maintenance Facility',
            'maximum_period' => 'code',
            'maximum_holiday' => 'code',
            'description' => 'code',
        ]);
        
    }
}
