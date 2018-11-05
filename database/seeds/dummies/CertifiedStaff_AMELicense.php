<?php

use Carbon\Carbon;
use App\Models\License;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CertifiedStaff_AMELicense extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Create EMPLOYEE */

        $aldrin = Employee::create([
            'code' => 'MMF-00002',
            'first_name' => 'Sugiharto',
        ]);

        /** Assign EMPLOYEE to AMEL */

        $amel = License::where('code', 'amel-dgca')->first();

        $aldrin->licenses()->attach($amel, [
            'number' => '2126',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2007-06-05'),
            'valid_until' => Carbon::createFromFormat('Y-m-d', '2009-06-05'),
        ]);

        // TODO: Assign AMEL to Rating
    }
}
