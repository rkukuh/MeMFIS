<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Frontend\EmployeeAttendance;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\WorkshiftSchedule;
use App\Models\Status;
use App\Models\AttendanceFile;
use App\Models\EmployeeWorkshift;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Frontend\EmployeeAttendanceStore;

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
            $file = $request->file('document');
            $name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $filename = $name.'.'.$file->getClientOriginalExtension();
            
            //todo to be able import to s3 disk
            $exist = Storage::disk('local')->url('attendance_files/'.$file->getClientOriginalName());
            // $exist = "/storage/attendance_files/BRC2190960192_attlog.dat"
        
            if($exist){
                $random = str_random(5);
                $filename = $name.'_'.$random.'.'.$file->getClientOriginalExtension();
                $name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME).'_'.$random;
            }

            $path = $file->storeAs(
                'attendance_files',$filename
            );

            $storagePath = Storage::disk('local')->path($path);
            // $storagePath = "/home/smartaircraft-dev/Projects/MeMFIS/storage/app/attendance_files/BRC2190960192_attlog_jZ4Yb.dat"
            AttendanceFile::create([
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
            

            $index = 0;
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

            for ($i=0; $i < count($data_final); $i++) { 
                for ($y=0; $y < count($data_final[$i]['date']); $y++) { 
                    
                    $employee = Employee::where('code',$data_final[$i]['nrp'])->first();
                    if(isset($employee->id)){

                        if(!$employee->employee_attendance()->where('employee_attendances.date',$data_final[$i]['date'][$y]['date'])->first()){
                            $in = '00:00:00';
                            $out = '00:00:00';
                            $status = Status::where('code','normal')->first()->id;

                            //IN & OUT
                            if(reset($data_final[$i]['date'][$y]['time'])){
                                $in = reset($data_final[$i]['date'][$y]['time']);
                            }

                            if(end($data_final[$i]['date'][$y]['time'])){
                                $out = end($data_final[$i]['date'][$y]['time']);
                            }

                            //CHECK LATE,EARLIER OR OVERTIME
                            $employee_workshift = EmployeeWorkshift::where('employee_id', $employee->id)->first();
                            
                            $late = 0;
                            $earlier_out = 0;
                            $overtime = 0;

                            if(isset($employee_workshift->workshift_id)){
                                $employee_schedule = WorkshiftSchedule::where('workshift_id',$employee_workshift->workshift_id)->get()->toArray();

                                for ($v=0; $v < count($employee_schedule); $v++) { 
                                    if(strtolower($data_final[$i]['date'][$y]['days']) == $employee_schedule[$v]['days']){
                                        
                                        //LATE
                                        if(strtotime($in) > strtotime($employee_schedule[$v]['in'])){
                                            if($in != '00:00:00' && $employee_schedule[$v]['in'] != '00:00:00'){
                                                $late = abs(strtotime($in) - strtotime($employee_schedule[$v]['in']));
                                                $status = Status::where('code','undiscipline')->first()->id;
                                            }
                                        };

                                        //EARLIER OUT
                                        if(strtotime($out) < strtotime($employee_schedule[$v]['out'])){
                                            if($out != '00:00:00' && $employee_schedule[$v]['out'] != '00:00:00'){
                                                $earlier_out = abs(strtotime($employee_schedule[$v]['out']) - strtotime($out));
                                                $status = Status::where('code','undiscipline')->first()->id;
                                            }
                                        };

                                        //OVERTIME
                                        if(strtotime($out) > strtotime($employee_schedule[$v]['out'])){
                                            if($out != '00:00:00' && $employee_schedule[$v]['out'] != '00:00:00'){
                                                $overtime = abs(strtotime($out) - strtotime($employee_schedule[$v]['out']));
                                                $status = Status::where('code','normal')->first()->id;
                                            }
                                        };

                                    }else{
                                        //CHECK ABSENCE
                                        $status = null;
                                    }  
                                }
                            }else{
                                if(strtolower($data_final[$i]['date'][$y]['days']) == 'saturday' || strtolower($data_final[$i]['date'][$y]['days']) == 'sunday'){
                                    $status = null;
                                }else{
                                //LATE
                                if(strtotime($in) > strtotime('07:30:00')){
                                    if($in != '00:00:00'){
                                        $late = abs(strtotime($in) - strtotime('07:30:00'));
                                        $status = Status::where('code','undiscipline')->first()->id;
                                    }
                                };

                                //EARLIER OUT
                                if(strtotime($out) < strtotime(strtotime('16:30:00'))){
                                    if($out != '00:00:00'){
                                        $earlier_out = abs(strtotime('16:30:00') - strtotime($out));
                                        $status = Status::where('code','undiscipline')->first()->id;
                                    }
                                };

                                //OVERTIME
                                if(strtotime($out) > strtotime('16:30:00')){
                                    if($out != '00:00:00'){
                                        $overtime = abs(strtotime($out) - strtotime('16:30:00'));
                                        $status = Status::where('code','normal')->first()->id;
                                    }
                                };

                                //CHECK ABSENCE
                                if(!$data_final[$i]['date'][$y]['time'] && !$data_final[$i]['date'][$y]['time']){
                                    $status = Status::where('code','absence')->first()->id;
                                }
                            }
                            }
                            

                            //IN & OUT II
                            if($data_final[$i]['date'][$y]['time']){
                                if($in == $out){
                                    $out = '00:00:00';
                                    $late = 0;
                                    $earlier_out = 0;
                                    $overtime = 0;
                                    $status = Status::where('code','undiscipline')->first()->id;
                                }
                            }

                            $employee->employee_attendance()->create([
                                'uuid' => Str::uuid(),
                                'date' => $data_final[$i]['date'][$y]['date'],
                                'in' => $in,
                                'out' => $out,
                                'late_in' => $late,
                                'earlier_out' => $earlier_out,
                                'overtime' => $overtime,
                                'statuses_id' => $status
                            ]);
                        }

                    }

                }
            } 

            return redirect('import-fingerprint');
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
}
