<?php

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class AttendanceExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $months = [];

        for($bulan = 11 ; $bulan <= 12; $bulan++){
            $attendance = EmployeeAttendance::whereMonth('date', $bulan)->whereYear('date', 2019)->first();
            if(empty($attendance)){
                array_push($months, $bulan);
            }
        }
        // code yang dijalankan untuk trial
        $employees = Employee::get(); //todo where active and approved, tapi fitur belom ada
        // create attendance with null;
        $in = '00:00:00';
        $out = '00:00:00';

        foreach($months as $month){

            $daysInMonth = Carbon::create(2019, $month, 1, 0, 0, 0, 'Asia/Jakarta')->daysInMonth;

            foreach($employees as $employee){
                if(sizeof($employee->workshifts) > 0){
                    $workshift = $employee->workshifts->first();
                    $shifts = $workshift->workshift_schedules;

                    for($day = 1 ; $day <= $daysInMonth ; $day++){
                        $date = Carbon::create(2019, $month, $day, 0, 0, 0, 'Asia/Jakarta');

                        $employee_attendance = EmployeeAttendance::whereDate('date', $date)->where('employee_id', $employee->id)->first();

                        if(empty($employee_attendance)){

                            $attendance = EmployeeAttendance::create([
                                'employee_id' => $employee->id,
                                'date' => $date,
                                'in' => $in,
                                'out' => $out
                            ]);

                            $shift = $shifts->where('days', $days[$date->dayOfWeek])->first();
                            if($shift){
                                $status = Status::ofAttendance()->where('code','absence')->first();
                                $attendance->statuses()->attach($status->id);
                            }else{
                                $status = null;
                            }

                        }
                    }
                }
            }
        }




    }
}
