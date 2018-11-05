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
            'parent_id' => null,
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

        $supporting = Department::create([
            'code' => 'suporting',
            'name' => 'Suporting',
            'parent_id' => null,
        ]);

        /** FINANCE */

        $finance = Department::create([
            'code' => 'finance',
            'name' => 'Finance',
            'parent_id' => null,
        ]);

        /** ACCOUNTING */

        $accounting = Department::create([
            'code' => 'accounting',
            'name' => 'Accounting',
            'parent_id' => null,
        ]);
    }
}
