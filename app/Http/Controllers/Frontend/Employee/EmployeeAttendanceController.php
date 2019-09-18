<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Frontend\EmployeeAttendance;
use App\Http\Controllers\Controller;
use App\Models\Employee;
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
    public function store(EmployeeAttendanceStore $request,Employee $employee)
    {
        if(isset($request->document)){
            $data = 'D:\Documents\KHRISNA\WORK\memfis data\BRC2190960192_attlog.dat';
            $lines = file($data);
            $rows = [];

            $data_all = [];
            $data_nrp = [];

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

                $index++;
            }

            //Grouping nrp
            $unique_nrp = array_values(array_unique($data_nrp));

            for($i=0;$i < count($unique_nrp); $i++){
                
                $x = 0;
                $data_grouping = [];

                for($j=0;$j < count($data_all); $j++){
                        
                if($unique_nrp[$i] == $data_all[$j]['nrp']){
                    $data_grouping[$x] = [
                        'date' => $data_all[$j]['date'],
                        'time' => $data_all[$j]['time']
                    ];
                
                    $data_final[$i] = [
                        'nrp' => $unique_nrp[$i],
                        $unique_nrp[$i] => $data_grouping
                    ];
                    $x++;
                }

                }

            }
            // for($i=0;$i < count($data_all); $i++){
            //     if(isset($employee->where('code',$data_all[$i]['nrp'])->first()->id)){
            //         $check_nrp = $employee->where('code',$data_all[$i]['nrp'])->first()->id;
            //         // $check_attendance[$i] = $employee->employee_attendace()->where('employee_attendances.employee_id',$check_nrp)->where('employee_attendances.date')->first();
            //     }
            // }
                // dd(count($data_all));
                dd($data_final);
            // dd(array_search('19080148', $data_all));
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
