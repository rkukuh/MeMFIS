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
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2011-08-15'),
        ]);

        $aldrin->licenses()->attach($general_license, [
            'code' => 'A/P.3475',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2011-08-15'),
        ]);

        /** Assign GENERAL LICENSE to AVIATION DEGREE */

        $degree_a1 = Type::ofAviationSchoolDegree()->where('code', 'a1')->first();
        $degree_a4 = Type::ofAviationSchoolDegree()->where('code', 'a4')->first();
        $degree_c2 = Type::ofAviationSchoolDegree()->where('code', 'c2')->first();
        $degree_c4 = Type::ofAviationSchoolDegree()->where('code', 'c4')->first();

        /** Assign EMPLOYEE to AME LICENSE */

        $amel = License::where('code', 'amel-dgca')->first();

        $aldrin->licenses()->attach($amel, [
            'code' => '2126',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2007-06-05'),
            'valid_until' => Carbon::createFromFormat('Y-m-d', '2009-06-05'),
        ]);

        /** Assign AME LICENSE to RATING */

        //
    }
}
