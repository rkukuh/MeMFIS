<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\License;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CertifiedStaff extends Seeder
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
            'code' => 'MMF-00900',
            'first_name' => 'Aldrin',
            'last_name' => 'Collins',
        ]);

        /** Assign EMPLOYEE to GENERAL LICENSE */

        $general_license = License::where('code', 'general-license')->first();

        $aldrin->licenses()->attach($general_license, [
            'code' => 'E/I.3475',
            'issued_at' => '2011-08-15',
        ]);

        /** Assign EMPLOYEE to AME LICENSE */

        //
    }
}
