<?php

use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** PRODUCTION */

        $production = Department::create([
            'code' => 'production',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Production',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        Department::create([
            'code' => 'hm',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Heavy Maintenance',
            'parent_id' => $production->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        Department::create([
            'code' => 'ss',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Special Service',
            'parent_id' => $production->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** PRODUCTION > WORKSHOP */

        $workshop = Department::create([
            'code' => 'workshop',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Workshop',
            'parent_id' => $production->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        Department::create([
            'code' => 'instrument',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Instrument Shop',
            'parent_id' => $workshop->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        // TODO: Continue input workshops. See: Landing page.

        /** SUPPORTING */

        Department::create([
            'code' => 'supporting',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Supporting',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** FINANCE */

        Department::create([
            'code' => 'finance',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Finance',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** ACCOUNTING */

        Department::create([
            'code' => 'accounting',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Accounting',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** MARKETING */

        Department::create([
            'code' => 'marketing',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Marketing',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** MATERIAL */

        Department::create([
            'code' => 'material',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Material Planning',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** QUALITY */

        Department::create([
            'code' => 'quality',
            'company_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Quality',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);
    }
}
