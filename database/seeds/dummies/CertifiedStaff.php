<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\License;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Pivots\EmployeeLicense;

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

        // E/I.3475 details:

        $ei_3475 = EmployeeLicense::whereHas('employee', function ($query) use ($aldrin) {
                        return $query->where('employee_id', $aldrin->id);
                    })
                    ->where('code', 'E/I.3475')
                    ->first();

        EmployeeLicense::whereHas('employee', function ($query) use ($aldrin) {
                $query->where('employee_id', $aldrin->id);
            })
            ->find($ei_3475->id)
            ->general_licenses()
            ->createMany([
                [
                    'aviation_degree' => Type::ofAviationSchoolDegree()->where('code', 'c2')->first()->id,
                    'aviation_degree_no' => '214/1746/1932',
                ],
                [
                    'aviation_degree' => Type::ofAviationSchoolDegree()->where('code', 'c4')->first()->id,
                    'aviation_degree_no' => '159/3800/1135',
                ],
            ]);


        // A/P.3475 details:

        $ap_3475 = EmployeeLicense::whereHas('employee', function ($query) use ($aldrin) {
                        return $query->where('employee_id', $aldrin->id);
                    })
                    ->where('code', 'A/P.3475')
                    ->first();

        EmployeeLicense::whereHas('employee', function ($query) use ($aldrin) {
                $query->where('employee_id', $aldrin->id);
            })
            ->find($ap_3475->id)
            ->general_licenses()
            ->createMany([
                [
                    'aviation_degree' => Type::ofAviationSchoolDegree()->where('code', 'a1')->first()->id,
                    'aviation_degree_no' => '166/0010/2427',
                ],
                [
                    'aviation_degree' => Type::ofAviationSchoolDegree()->where('code', 'a4')->first()->id,
                    'aviation_degree_no' => '156/0894/2397',
                ],
            ]);

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
