<?php

namespace App\Http\Controllers\Frontend\Overtime;

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

use App\Models\Status;
use App\Models\Overtime;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OvertimeStore;
use App\Http\Requests\Frontend\OvertimeUpdate;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.overtime.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.overtime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\OvertimeStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OvertimeStore $request)
    {
        $is_validated = $request->validated();
        // dd($is_validated);

        $isAdmin = Auth::user()->hasRole("admin");
        $employee_id = Auth::id();
        if ($isAdmin) {
            $uuid = $request->input("search-employee-val");
            $employee_id = Employee::where("uuid",$uuid)->first()->id;
        }

        $date = $request->input("date");
        $start = $request->input("start_time");
        $end = $request->input("end_time");
        $start_diff = Carbon::parse($date." ".$start,"Asia/Jakarta");
        $end_diff = Carbon::parse($date." ".$end,"Asia/Jakarta");
        $time_diff = $start_diff->diff($end_diff)->format("%H:%I:%S");
        $desc = $request->input("description");
        $code = DocumentNumber::generate('OVRT-', OvertimeStore::withTrashed()->count()+1);
        // $timestamp_start = Carbon::parse($date." ".$start,"Asia/Jakarta");
        // $timestamp_end = Carbon::parse($date." ". $end,"Asia/Jakarta");
        // ->format("%H:%I:%S")
        
        $status = Status::ofOvertime()->where('code','open')->first()->id;

        Overtime::create([
                "uuid" => Str::uuid(),
                "code" => $code,
                "employee_id" => $employee_id,
                "date" => $date,
                "start" => $start,
                "end" => $end,
                "desc" => $desc,
                "total" => $time_diff,
                "statuses_id" => $status
            ]
        );

        // return response()->json($overtime_data);

        return redirect()->route('frontend.overtime.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function show(Overtime $overtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Overtime $overtime)
    {
        // $theOvertime = Overtime::findOrFail($overtime->id);
        $employee_data = $overtime->employee;
        return view("frontend.overtime.edit",["overtime" => $overtime,"employee" => $employee_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\OvertimeUpdate  $request
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function update(OvertimeUpdate $request, Overtime $overtime)
    {
        $overtime_data = Overtime::findOrFail($overtime->id);
        $validated = $request->validated();
        
        $isAdmin = Auth::user()->hasRole("admin");
        $employee_id = Auth::id();
        if ($isAdmin) {
            $uuid = $validated["search-employee-val"];
            $employee_id = Employee::where("uuid",$uuid)->first()->id;
        }

        $date = $validated["date"];
        $start =$validated["start_time"];
        $end = $validated["end_time"];
        $start_diff = Carbon::parse($date." ".$start,"Asia/Jakarta");
        $end_diff = Carbon::parse($date." ".$end,"Asia/Jakarta");
        $time_diff = $start_diff->diff($end_diff)->format("%H:%I:%S");
        $desc = $validated["description"];
        
        $status = $overtime->statuses_id;

        $data = [
                "uuid" => $overtime->uuid,
                "employee_id" => $employee_id,
                "date" => $date,
                "start" => $start,
                "end" => $end,
                "desc" => $desc,
                "total" => $time_diff,
                "statuses_id" => $status
            ]
;
        $overtime_data->fill($data);
        $overtime_data->save();

        // $request->session()->flash("success", $title . " is successfully updated");
        // return redirect()->route("blogposts.show",["blogpost" => $blogpost->id]);
        return redirect()->route('frontend.overtime.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overtime $overtime)
    {
        //
    }

    public function approve(Overtime $overtime, Request $request)
    {
        # code...
    }

    /**
     * API for getting attendance for certain employee on that date
     * 
     * @param \App\Models\Employee  $employee
     * @param $date 
     * @return \Illuminate\Http\Response
     * 
     */
    public function getAttendance(Employee $employee, $date){
        $attendances = EmployeeAttendance::where('employee_id',$employee->id)->whereDate('date', $date)->first();

        return response()->json($attendances);
    }
}
