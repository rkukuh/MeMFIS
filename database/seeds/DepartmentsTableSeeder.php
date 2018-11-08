<?php

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
            'name' => 'Production',
        ]);

        Department::create([
            'code' => 'hm',
            'name' => 'Heavy Maintenance',
            'parent_id' => $production->id,
        ]);

        Department::create([
            'code' => 'ss',
            'name' => 'Special Service',
            'parent_id' => $production->id,
        ]);

        /** PRODUCTION > WORKSHOP */

        $workshop = Department::create([
            'code' => 'workshop',
            'name' => 'Workshop',
            'parent_id' => $production->id,
        ]);

        Department::create([
            'code' => 'instrument',
            'name' => 'Instrument Shop',
            'parent_id' => $workshop->id,
        ]);

        // TODO: Continue input workshops. See: Landing page.

        /** SUPPORTING */

        Department::create([
            'code' => 'supporting',
            'name' => 'Supporting',
        ]);

        /** FINANCE */

        Department::create([
            'code' => 'finance',
            'name' => 'Finance',
        ]);

        /** ACCOUNTING */

        Department::create([
            'code' => 'accounting',
            'name' => 'Accounting',
        ]);

        /** MARKETING */

        Department::create([
            'code' => 'marketing',
            'name' => 'Marketing',
        ]);

        /** MATERIAL */

        Department::create([
            'code' => 'material',
            'name' => 'Material Planning',
        ]);

        /** QUALITY */

        Department::create([
            'code' => 'quality',
            'name' => 'Quality',
        ]);
    }
}
