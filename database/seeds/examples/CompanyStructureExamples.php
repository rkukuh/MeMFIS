<?php

use App\Models\Type;
use App\Models\Company;
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
        $mmfcom = Company::where('code', 'mmf')->first();

        $ptmmf = Department::create([
            'code' => 'HO',
            'company_id' => $mmfcom->id,
            'parent_id' => null,
            'type_id' => Type::ofCompany()->where('code', 'HOF001')->first()->id,
            'name' => 'PT. Merpati Maintenance Facility',
            'maximum_period' => null,
            'maximum_holiday' => null,
            'description' => 'Perusahaan MRO Head Office',
        ]);
        
        Department::create([
            'code' => 'SBU',
            'company_id' => $mmfcom->id,
            'parent_id' => $ptmmf->id,
            'type_id' => Type::ofCompany()->where('code', 'RGF001')->first()->id,
            'name' => 'MMF Workshop Jakarta',
            'maximum_period' => null,
            'maximum_holiday' => null,
            'description' => 'Cabang MMF Jakarta',
        ]);
        
        $fa = Department::create([
            'code' => 'FA',
            'company_id' => $mmfcom->id,
            'parent_id' => $ptmmf->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'Finance Accounting',
            'maximum_period' => 40,
            'maximum_holiday' => 100000,
            'description' => 'Department Finance Accounting MMF',
        ]);
        
        $prd = Department::create([
            'code' => 'PRD',
            'company_id' => $mmfcom->id,
            'parent_id' => $ptmmf->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'Production',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
            'description' => 'Department Produksi MMF',
        ]);
        
        Department::create([
            'code' => 'HM',
            'company_id' => $mmfcom->id,
            'parent_id' => $prd->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'Heavy Maintenance',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
            'description' => 'Produksi Heavy Maintenance MMF',
        ]);
        
        $shp = Department::create([
            'code' => 'SHP',
            'company_id' => $mmfcom->id,
            'parent_id' => $prd->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'Workshop',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
            'description' => 'Produksi Workshop MMF',
        ]);
        
        Department::create([
            'code' => 'SHP01',
            'company_id' => $mmfcom->id,
            'parent_id' => $shp->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'IERA Shop',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
            'description' => 'Sub Unit produksi Workshop',
        ]);
        
        Department::create([
            'code' => 'SHP02',
            'company_id' => $mmfcom->id,
            'parent_id' => $shp->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'Mechanical Shop',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
            'description' => 'Sub Unit produksi Workshop',
        ]);
        
        Department::create([
            'code' => 'SHP03',
            'company_id' => $mmfcom->id,
            'parent_id' => $shp->id,
            'type_id' => Type::ofCompany()->where('code', 'DPT001')->first()->id,
            'name' => 'Propulsion And Accessories Shop',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
            'description' => 'Sub Unit produksi Workshop',
        ]);
        
    }
}
