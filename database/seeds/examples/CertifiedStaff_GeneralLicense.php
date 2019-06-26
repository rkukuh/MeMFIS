<?php

use App\User;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\License;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Pivots\EmployeeLicense;

class CertifiedStaff_GeneralLicense extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Create EMPLOYEE */

        $aldrin = Employee::where('user_id', User::where('email', 'aldrin@ptmmf.co.id')->first()->id)->first();


        /** Assign EMPLOYEE to GENERAL LICENSE */

        $general_license = License::where('code', 'general-license')->first();

        $aldrin->licenses()->attach($general_license, [
            'number' => 'E/I.3475',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2011-08-15'),
        ]);

        $aldrin->licenses()->attach($general_license, [
            'number' => 'A/P.3475',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2011-08-15'),
        ]);


        /** Assign GENERAL LICENSE to AVIATION DEGREE */

        // E/I.3475 details:

        EmployeeLicense::whereHas('employee', function ($query) use ($aldrin) {
                return $query->where('employee_id', $aldrin->id);
            })
            ->where('number', 'E/I.3475')
            ->first()
            ->general_licenses()
            ->createMany([
                [
                    'aviation_degree' => Type::ofAviationDegree()->where('code', 'c2')->first()->id,
                    'aviation_degree_no' => '214/1746/1932',
                ],
                [
                    'aviation_degree' => Type::ofAviationDegree()->where('code', 'c4')->first()->id,
                    'aviation_degree_no' => '159/3800/1135',
                ],
            ]);

        // A/P.3475 details:

        EmployeeLicense::whereHas('employee', function ($query) use ($aldrin) {
                return $query->where('employee_id', $aldrin->id);
            })
            ->where('number', 'A/P.3475')
            ->first()
            ->general_licenses()
            ->createMany([
                [
                    'aviation_degree' => Type::ofAviationDegree()->where('code', 'a1')->first()->id,
                    'aviation_degree_no' => '166/0010/2427',
                ],
                [
                    'aviation_degree' => Type::ofAviationDegree()->where('code', 'a4')->first()->id,
                    'aviation_degree_no' => '156/0894/2397',
                ],
            ]);
    }
}
