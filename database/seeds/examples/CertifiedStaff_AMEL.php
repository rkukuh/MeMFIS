<?php

use Carbon\Carbon;
use App\Models\Type;
use App\Models\License;
use App\Models\Aircraft;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Pivots\EmployeeLicense;

class CertifiedStaff_AMEL extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Create EMPLOYEE */

        $sugiharto = Employee::create([
            'code' => 'MMF-00002',
            'first_name' => 'Sugiharto',
        ]);

        /** Assign EMPLOYEE to AMEL */

        $amel = License::where('code', 'amel-dgca')->first();

        $sugiharto->licenses()->attach($amel, [
            'number' => '2126',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2007-06-05'),
            'valid_until' => Carbon::createFromFormat('Y-m-d', '2009-06-05'),
        ]);

        /** Assign AMEL to RATING (it could be Aircraft or Engine) */

        EmployeeLicense::whereHas('employee', function ($query) use ($sugiharto) {
                return $query->where('employee_id', $sugiharto->id);
            })
            ->where('number', '2126')
            ->first()
            ->amels()
            ->saveMany([
                Aircraft::where('code', 'cn-235')->first(),
                Aircraft::where('code', 'b737-300')->first()
            ]);
    }
}
