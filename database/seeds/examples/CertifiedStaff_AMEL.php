<?php

use App\User;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\Item;
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

        $sugiharto = Employee::where('user_id', User::where('email', 'sugiharto@ptmmf.co.id')->first()->id)->first();

        /** Assign EMPLOYEE to AMEL */

        $amel = License::where('code', 'amel-dgca')->first();

        $sugiharto->licenses()->attach($amel, [
            'number' => '2126',
            'issued_at' => Carbon::createFromFormat('Y-m-d', '2007-06-05'),
            'valid_until' => Carbon::createFromFormat('Y-m-d', '2009-06-05'),
        ]);

        /** Assign AMEL to Rating: AIRFRAME */

        $amel = EmployeeLicense::whereHas('employee', function ($query) use ($sugiharto) {
                    return $query->where('employee_id', $sugiharto->id);
                })
                ->where('number', '2126')
                ->first()
                ->amels()
                ->create([
                    'rating' => Type::ofAPERI()->where('code', 'airframe')->first()->id
                ]);

        Aircraft::where('code', 'cn-235')
                ->first()
                ->amels()
                ->save($amel);

        Aircraft::where('code', 'b737-300')
                ->first()
                ->amels()
                ->save($amel);

        /** Assign AMEL to Rating: ENGINE (POWERPLANT) */

        $amel = EmployeeLicense::whereHas('employee', function ($query) use ($sugiharto) {
                    return $query->where('employee_id', $sugiharto->id);
                })
                ->where('number', '2126')
                ->first()
                ->amels()
                ->create([
                    'rating' => Type::ofAPERI()->where('code', 'powerplant')->first()->id
                ]);

        Item::where('code', 'ct7-7a')
            ->first()
            ->amels()
            ->save($amel);

        Item::where('code', 'cfm56-3')
            ->first()
            ->amels()
            ->save($amel);

        Item::where('code', 'cfm56-3b1')
            ->first()
            ->amels()
            ->save($amel);

        Item::where('code', 'cfm56-3c1')
            ->first()
            ->amels()
            ->save($amel);
    }
}
