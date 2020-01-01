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

        $production = Company::create([
            'code' => 'production',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Production',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        Company::create([
            'code' => 'hm',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Heavy Maintenance',
            'parent_id' => $production->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        Company::create([
            'code' => 'ss',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Special Service',
            'parent_id' => $production->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** PRODUCTION > WORKSHOP */

        $workshop = Company::create([
            'code' => 'workshop',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Workshop',
            'parent_id' => $production->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        Company::create([
            'code' => 'instrument',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Instrument Shop',
            'parent_id' => $workshop->id,
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        // TODO: Continue input workshops. See: Landing page.

        /** SUPPORTING */

        Company::create([
            'code' => 'supporting',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Supporting',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** FINANCE */

        Company::create([
            'code' => 'finance',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Finance',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** ACCOUNTING */

        Company::create([
            'code' => 'accounting',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Accounting',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** MARKETING */

        Company::create([
            'code' => 'marketing',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Marketing',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** MATERIAL */

        Company::create([
            'code' => 'material',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Material Planning',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);

        /** QUALITY */

        Company::create([
            'code' => 'quality',
            'parent_id' => Company::where('code', 'mmf')->first()->id,
            'name' => 'Quality',
            'maximum_period' => 60,
            'maximum_holiday' => 100000,
        ]);
    }
}
