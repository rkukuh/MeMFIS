<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** PHONE */

        Type::create([
            'name' => 'Work',
            'of'   => 'phone',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'   => 'phone',
        ]);

        /** EMAIL */

        Type::create([
            'name' => 'Work',
            'of'   => 'email',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'   => 'email',
        ]);

        /** FAX */

        Type::create([
            'name' => 'Work',
            'of'   => 'fax',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'   => 'fax',
        ]);

        /** JOURNAL */

        Type::create([
            'name' => 'Aktiva',
            'of'  => 'journal',
        ]);

        Type::create([
            'name' => 'Pasiva',
            'of'   => 'journal',
        ]);

        Type::create([
            'name' => 'Ekuitas',
            'of'   => 'journal',
        ]);

        Type::create([
            'name' => 'Pendapatan',
            'of'   => 'journal',
        ]);

        Type::create([
            'name' => 'Biaya',
            'of'   => 'journal',
        ]);

        /** ELIGIBILTY */

        Type::create([
            'name' => 'DHC-6',
            'of'   => 'eligibility',
        ]);

        /** ARC */

        Type::create([
            'name' => 'Tested',
            'of'   => 'arc',
        ]);

        Type::create([
            'name' => 'Inspected',
            'of'   => 'arc',
        ]);

        Type::create([
            'name' => 'Repaired',
            'of'   => 'arc',
        ]);

        Type::create([
            'name' => 'Overhauled',
            'of'   => 'arc',
        ]);

        /** CAPABILITY */

        Type::create([
            'name' => 'Inspection',
            'of'   => 'capability',
        ]);

        Type::create([
            'name' => 'Check and Test',
            'of'   => 'capability',
        ]);

        Type::create([
            'name' => 'Repair',
            'of'   => 'capability',
        ]);

        Type::create([
            'name' => 'Overhaul',
            'of'   => 'capability',
        ]);

        /** REGULATOR / AUTHORITY */

        Type::create([
            'name' => 'DGCA',
            'of'   => 'regulator',
        ]);

        Type::create([
            'name' => 'EASA',
            'of'   => 'regulator',
        ]);

        Type::create([
            'name' => 'FAA',
            'of'   => 'regulator',
        ]);

    }
}
