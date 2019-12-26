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

   
          
        foreach($months as $month){

            $daysInMonth = Carbon::create(2019, $month, 1, 0, 0, 0, 'Asia/Jakarta')->daysInMonth;

            foreach($employees as $employee){
                $timezone = 'Asia/Jakarta';
                if(sizeof($employee->workshifts) > 0){
                    $workshift = $employee->workshifts->first();
                    $shifts = $workshift->workshift_schedules;

                    for($day = 1 ; $day <= $daysInMonth ; $day++){
                        $in = Carbon::createFromTimeString('07:29:00', $timezone);
                        $out = Carbon::createFromTimeString('16:31:00', $timezone);
                
                        $late = 0;
                        $earlier_out = 0;
                        $statusses = [];
                        $faker = \Faker\Factory::create();
                        $overtime = 0;
                        $date = Carbon::create(2019, $month, $day, 0, 0, 0, 'Asia/Jakarta');

                        $employee_attendance = EmployeeAttendance::whereDate('date', $date)->where('employee_id', $employee->id)->first();

                        if(empty($employee_attendance)){
                            
                            $shift = $shifts->where('days', $days[$date->dayOfWeek])->first();
                            
                            if($shift){
                                /** set all the time from string into carbon, so it can be calculated for later purpose */ 
                                $shift->in = Carbon::createFromTimeString($shift->in, $timezone);
                                $shift->out = Carbon::createFromTimeString($shift->out, $timezone);
                                $shift->break_in = Carbon::createFromTimeString($shift->break_in, $timezone);
                                $shift->break_out = Carbon::createFromTimeString($shift->break_out, $timezone);

                                /** late */
                                if($faker->boolean()){
                                    $in = $in->addMinutes( $faker->numberBetween(1,30) );
                                   
                                    $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                    array_push($statusses, $status->id);
                                    
                                    $status = Status::ofAttendance()->where('code','late')->first();
                                    array_push($statusses, $status->id);

                                    $shift->in->diffInSeconds($in);
                                    /** very late */
                                    if($faker->boolean()){
                                        $in = $in->addMinutes( $faker->numberBetween(31,60) );
                                        array_pop($statusses);  
                                        $status = Status::ofAttendance()->where('code','very-late')->first();
                                        array_push($statusses, $status->id);  

                                        $shift->in->diffInSeconds($in);
                                    }
                                }
                                /** earlier leave */
                                if($faker->boolean()){
                                    $out = $out->subMinutes( $faker->numberBetween(1,30) );
                                    $status = Status::ofAttendance()->where('code','earlier-leave')->first();
                                    array_push($statusses, $status->id);

                                    $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                    array_push($statusses, $status->id);
                                
                                    $earlier_out = $shift->out->diffInSeconds($out);


                                }elseif($faker->boolean()){
                                    /**  overtime */
                                    $out = $out->addMinutes( $faker->numberBetween(30,60) );

                                    $overtime = $out->diffInMinutes($shift->out); 
                                }

                                $indiscipline = Status::ofAttendance()->where('code','indiscipline')->first();
                                
                                // if(!in_array($indiscipline->id, $statusses)){
                                //     /** Normal */
                                //     $status = Status::ofAttendance()->where('code','normal')->first();
                                //     array_push($statusses, $status->id);
                                // }

                                if($in <= $shift->in && $out >= $shift->out){
                                    /** Normal */
                                    $status = Status::ofAttendance()->where('code','normal')->first();
                                    array_push($statusses, $status->id);
                                }
                                
                            }else{
                                $status = null;
                            }

                            $statusses = array_unique($statusses);

                            $attendance = EmployeeAttendance::create([
                                'employee_id' => $employee->id,
                                'date' => $date,
                                'late_in' => $late,
                                'earlier_out' => $earlier_out,
                                'overtime' => $overtime,
                                'in' => $in,
                                'out' => $out
                            ]);

                            $attendance->statuses()->attach($statusses);

                        }
                    }
                }
            }
        }
    }
}
