<?php

namespace App\Http\Controllers\Frontend\Employee;
use Config;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Frontend\EmployeeAttendanceStore;
use App\Http\Controllers\Controller;

use App\Models\Status;
use App\Models\Employee;
use App\Models\AttendanceFile;
use App\Models\WorkshiftSchedule;
use App\Models\EmployeeWorkshift;
use App\Models\EmployeeAttendance;

class EmployeeAttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.import-fingerprint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.import-fingerprint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeAttendanceStore $request)
    {
        if(isset($request->document)){
            $last_import = AttendanceFile::orderBy('created_at','DESC')->first();
            $last_index = 0;

            if($last_import){
                // get file from cloud
                $s3 = Storage::disk('s3');
                $client = $s3->getDriver()->getAdapter()->getClient();
                $bucket = Config::get('filesystems.disks.s3.bucket');

                $command = $client->getCommand('GetObject', [
                    'Bucket' => $bucket,
                    'Key' => $last_import->path
                ]);
        
                $requestS3 = $client->createPresignedRequest($command, '+20 minutes');
        
                $url = (string) $requestS3->getUri();
                $last_index = sizeof(file($url)) - 1;
            }

            $file = $request->file('document');

            $name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $filename = $name.'.'.$file->getClientOriginalExtension();
            
            $exist = Storage::disk('s3')->url('attendance_files/'.$file->getClientOriginalName());
        
            if($exist){
                $random = str_random(5);
                $filename = $name.'_'.$random.'.'.$file->getClientOriginalExtension();
                $name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME).'_'.$random;
            }

            $destination = 'attendance_files';
            $storagePath = Storage::disk('s3')->putFileAs($destination,$file, $filename);

            $attenddanceFile = AttendanceFile::create([
                'uuid' => Str::uuid(),
                'name' => $name,
                'filename' => $filename,
                'path' => $storagePath,
                'imported_by' => Employee::where('user_id',Auth::id())->first()->id
            ]);
            
            $data = $storagePath;
            $lines = file($file);
            $rows = [];

            $data_all = [];
            $data_nrp = [];
            $data_date = [];
            $nrps = [];

            $index = 0;
            
            // slice unneded data rows from last time import.
            // if($last_index){
            //     $lines = array_slice($lines,$last_index);
            // }

            foreach ($lines as $line) {
                $data = explode('\t', trim($line));
                $split_line = array_shift($data);
                $rows[$index] = $split_line;

                $line_data[$index] = explode("\t",$rows[$index]);

                $data_all[$index] = [
                    'nrp' => $line_data[$index][0],
                    'date' => explode(' ',$line_data[$index][1])[0],
                    'time' => explode(' ',$line_data[$index][1])[1]
                ];

                $data_nrp[$index] =  $line_data[$index][0];
                $data_date[$index] =  explode(' ',$line_data[$index][1])[0];

                $index++;
            }

            //Grouping nrp
            $unique_nrp = array_values(array_unique($data_nrp));

            for($i=0;$i < count($unique_nrp); $i++){
                
                $x = 0;
                $data_grouping_nrp = [];

                for($j=0;$j < count($data_all); $j++){
                        
                    if($unique_nrp[$i] == $data_all[$j]['nrp']){
                        $data_grouping_nrp[$x] = [
                            'date' => $data_all[$j]['date'],
                            'time' => $data_all[$j]['time']
                        ];
                    
                        $data_grouping[$i] = [
                            'nrp' => $unique_nrp[$i],
                            $unique_nrp[$i] => $data_grouping_nrp
                        ];
                        $x++;
                    }

                }

            }

            //Next Grouping date
            $unique_date = array_values(array_unique($data_date));

            for ($i=0; $i < count($data_grouping); $i++) { 

                for ($x=0; $x <count($unique_date) ; $x++) { 
                    $z = 0;
                    $data_grouping_date = [];
                    for ($j=0; $j < count($data_grouping[$i][$data_grouping[$i]['nrp']]); $j++) { 
                    if($unique_date[$x] == $data_grouping[$i][$data_grouping[$i]['nrp']][$j]['date']){

                        $data_grouping_date[$z] = $data_grouping[$i][$data_grouping[$i]['nrp']][$j]['time'];

                        $z++;
                    }
                    }

                    asort($data_grouping_date);

                    $formatTime = strtotime($unique_date[$x]);
                    $date_final[$x] = [
                        'date' => $unique_date[$x],
                        'days' => date('l', $formatTime),
                        'time' => array_values($data_grouping_date)
                    ];

                    $data_final[$i] = [
                        'nrp' => $data_grouping[$i]['nrp'],
                        'date' => $date_final
                    ];
                }
            }

            $timezone = 'Asia/Jakarta';
            /** For now use default value of late tolerance time = 30 minutes  */
            $late_tolerance_time = Carbon::createFromTimeString('07:00:00', $timezone);

            foreach($data_final as $attendances){
                $employee = Employee::where('code',$attendances['nrp'])->first();
                if($employee){
                    $workshifts = $employee->workshifts()->first();
                    $late = 0;
                    $earlier_out = 0;
                    if($workshifts){
                        $schedules = $workshifts->workshift_schedules;
                        foreach($attendances['date'] as $attendance){
                            /** get shift for that day  */ 
                            $shift = $schedules->where('days', strtolower($attendance['days']) )->first();
    
                            /** check if scan day on workshift or not */
                            if($shift){
                                $overtime = 0;
                                $statuses = [];
                                /** if true, proceed updating attendances */
    
                                /** set all the time from string into carbon, so it can be calculated for later purpose */ 
                                $shift->in = Carbon::createFromTimeString($shift->in, $timezone);
                                $shift->out = Carbon::createFromTimeString($shift->out, $timezone);
                                $shift->break_in = Carbon::createFromTimeString($shift->break_in, $timezone);
                                $shift->break_out = Carbon::createFromTimeString($shift->break_out, $timezone);
    
                                /** 
                                 *  use from workshift instead of manually input, but still using 30. 
                                 *  TODO: get time tolerance from table  
                                 */
                                $late_tolerance_time = $shift->in->addMinutes(30);
    
                                /** counting user finger scan time on given day */
                                $count_timestamps = sizeof($attendance['time']);
    
                                /** give default value */
                                $check_in   = Carbon::createFromTimeString('00:00:00', $timezone);
                                $check_out  = Carbon::createFromTimeString('00:00:00', $timezone);
    
                                /** giving statuses depends on scan timestamps on that day */
                                switch($count_timestamps){
                                    case 0:
                                        $status = Status::ofAttendance()->where('code','absence')->first();
                                        array_push($statuses, $status->id);
                                    break;
                                    case 1:
                                        $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                        array_push($statuses, $status->id);
    
                                        /** TODO: identify which scan is missed, check in or check out */
                                        $scan_time = Carbon::createFromTimeString($attendance['time'][0], $timezone);
                                        $late_tolerance = $late_tolerance_time->diffInMinutes($check_in);
    
                                        $probably_in = $scan_time->diffInMinutes($shift->in);
                                        $probably_out = $scan_time->diffInMinutes($shift->out);
                                        
                                        if($probably_in < $probably_out){
                                            /** closer to shift in */
                                            if($check_in > $shift->in){
                                                /** Late */
                                                $status = Status::ofAttendance()->where('code','late')->first();
                                                array_push($statuses, $status->id);
        
                                                $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                                array_push($statuses, $status->id);
                                            }elseif($check_in > $shift->in and $late_tolerance > 30){
                                                /** Very late */
                                                $status = Status::ofAttendance()->where('code','very-late')->first();
                                                array_push($statuses, $status->id);
                                            }
                                        }else{
                                            /** closer to shift out */
                                            if($check_out < $shift->out){
                                                /** earlier leave */
                                                $status = Status::ofAttendance()->where('code','earlier-leave')->first();
                                                array_push($statuses, $status->id);
        
                                                $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                                array_push($statuses, $status->id);
                                            }elseif($check_out > $shift->out){
                                                /**  overtime */
                                                $overtime = $check_out->diffInMinutes($shift->out); 
                                            }
                                        }
                                    break;
                                    case 2:
                                        
                                        $check_in   = Carbon::createFromTimeString($attendance['time'][0], $timezone);
                                        $check_out  = Carbon::createFromTimeString($attendance['time'][1], $timezone);
                                        $late_tolerance = $late_tolerance_time->diffInMinutes($check_in);
    
                                        if($check_in > $shift->in){
                                            /** Late */
                                            $status = Status::ofAttendance()->where('code','late')->first();
                                            array_push($statuses, $status->id);
                                            $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                            array_push($statuses, $status->id);
    
                                            $late = $shift->in->diffInSeconds($check_in);
                                        }elseif($check_in > $shift->in and $late_tolerance > 30){
                                            /** Very late */
                                            $status = Status::ofAttendance()->where('code','very-late')->first();
                                            array_push($statuses, $status->id);
    
                                            $late = $shift->in->diffInSeconds($check_in);
                                        }
    
                                        if($check_out < $shift->out){
                                            /** earlier leave */
                                            $status = Status::ofAttendance()->where('code','earlier-leave')->first();
                                            array_push($statuses, $status->id);
    
                                            $status = Status::ofAttendance()->where('code','indiscipline')->first();
                                            array_push($statuses, $status->id);
    
                                            $earlier_out = $shift->out->diffInSeconds($check_out);
    
                                        }elseif($check_out > $shift->out){
                                            /**  overtime */
                                            $overtime = $check_out->diffInMinutes($shift->out); 
                                        }
    
                                        if($check_in <= $shift->in && $check_out >= $shift->out){
                                            /** Normal */
                                            $status = Status::ofAttendance()->where('code','normal')->first();
                                            array_push($statuses, $status->id);
                                        }
                                    break;
                                }
    
                                $statuses = array_unique($statuses);
                                // dump($statuses);
    
                                $attendance_to_update = EmployeeAttendance::where('employee_id',$employee->id)->whereDate('date',$attendance)->first();
                                if($attendance_to_update){
                                    
                                    $attendance_statuses = $attendance_to_update->statuses;
                                    foreach($attendance_statuses as $status_id){
                                        $attendance_to_update->statuses()->updateExistingPivot($status_id, ['deleted_at' => Carbon::now()]);
                                    }
                                    
                                    if($attendance_to_update){
                                        $attendance_to_update->update([
                                            'employee_id' => $employee->id,
                                            'in' => $check_in,
                                            'out' => $check_out,
                                            'late_in' => $late,
                                            'earlier_out' => $earlier_out,
                                            'overtime' => $overtime
                                        ]);
                                        
                                        $attendance_to_update->statuses()->attach($statuses);
                                    }
                                }
                            }else{
                                /** TODO : if false, check for overtime */
    
                            }
                        }
                    }else{
                        //  giving default value like days, shift in & out, tolerances, etc.
                    }
                    // updating selected date
                }else{
                    array_push($nrps, $attendances['nrp']);
                }
                
            }

            return redirect('import-fingerprint')->with('success', ['title' => 'Unregistered NRP on system', 'message' => $nrps.' reupload again after registering these NRPs']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\EmployeeAttendance  $employeeAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeAttendance $employeeAttendance)
    {
        //
    }

    /**
     * Store a newly created employee attendances in storage.
     */
    public function createAttendances(){
        $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        // code yang seharusnya dijalankan sehari-hari
        $employees = Employee::get(); //todo where active and approved, tapi fitur belom ada
        // create attendance with null;
        $in = '00:00:00';
        $out = '00:00:00';

        $attendance = EmployeeAttendance::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->first();

        if(empty($attendance)){
            foreach($employees as $employee){
                EmployeeAttendance::create([
                    'employee_id' => $employee->id,
                    'date' => Carbon::today(),
                    'in' => $in,
                    'out' => $out
                ]);
            }
        }else{
            return;
        }

       

        // code yang dijalankan untuk trial
        // $employees = Employee::get(); //todo where active and approved, tapi fitur belom ada
        // // create attendance with null;
        // $in = '00:00:00';
        // $out = '00:00:00';
        
        // foreach($employees as $employee){
        //     if(sizeof($employee->workshifts) > 0){
        //         $workshift = $employee->workshifts->first();
        //         $shifts = $workshift->workshift_schedules;
                
        //         for($day = 1 ; $day <= 31 ; $day++){
        //             $date = Carbon::create(2019, 11, $day, 0, 0, 0, 'Asia/Jakarta');
    
        //             $attendance = EmployeeAttendance::create([
        //                 'employee_id' => $employee->id,
        //                 'date' => $date,
        //                 'in' => $in,
        //                 'out' => $out
        //             ]);
    
        //             $shift = $shifts->where('days', $days[$date->dayOfWeek])->first();
        //             if($shift){
        //                 $status = Status::ofAttendance()->where('code','absence')->first();
        //                 $attendance->statuses()->attach($status->id);
        //             }else{
        //                 $status = null;
        //             }


        //         }
        //     }

        // }
    }
}
