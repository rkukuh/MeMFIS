<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\Overtime;
use App\Http\Controllers\Controller;
use App\Models\Approval;
use Illuminate\Support\Str;
use App\Models\Status;
use App\Http\Requests\Frontend\OvertimeStore;
use App\Http\Requests\Frontend\OvertimeUpdate;
use App\Models\Employee;
use Carbon\Carbon;

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

        $isAdmin = Auth::user()->hasRole("admin");
        $employee_id = Auth::id();
        if ($isAdmin) {
            $uuid = $request->input("search-journal-val");
            $employee_id = Employee::where("uuid",$uuid)->first()->id;
        }

        $date = $request->input("date");
        $start = $request->input("start_time");
        $end = $request->input("end_time");
        
        
        $desc = $request->input("description");
        $timestamp_start = Carbon::parse($date." ".$start,"Asia/Jakarta");
        $timestamp_end = Carbon::parse($date." ". $end,"Asia/Jakarta");
        $time_diff = $timestamp_start->diff($timestamp_end)->format("%H:%I:%S");
        
        $status = Status::ofOvertime()->where('code','open')->first()->id;

        $overtime_data = Overtime::create([
                "uuid" => Str::uuid(),
                "employee_id" => $employee_id,
                "start" => $timestamp_start,
                "end" => $timestamp_end,
                "date" => $date,
                "desc" => $desc,
                "total" => $time_diff,
                "statuses_id" => $status
            ]
        );

        // dd($overtime_data)
        // $employee->employee_attendace()->create([
        //     'uuid' => Str::uuid(),
        //     'date' => $data_final[$i]['date'][$y]['date'],
        //     'in' => $in,
        //     'out' => $out,
        //     'late_in' => $late,
        //     'earlier_out' => $earlier_out,
        //     'overtime' => $overtime,
        //     'statuses_id' => $status
        // ]);

        // return response()->json($overtime_data);

        return redirect('frontend.overtime.index');
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
        //
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
        //
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
}
