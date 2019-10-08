<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Overtime;
use App\Http\Controllers\Controller;
use App\Models\Approval;
use Illuminate\Support\Str;
use App\Models\Status;
use App\Http\Requests\Frontend\OvertimeStore;
use App\Http\Requests\Frontend\OvertimeUpdate;
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

        // $error_msgs = [];
        $date = $request->input("date");
        $start = $request->input("start_time");
        $end = $request->input("end_time");
        // if ($start < $end) {
        //     $error_msg = array(
        //         'message' => "End time should be higher than Start Time",
        //         'title' => "Overtime Errors",
        //         'alert-type' => "error"
        //     );
        //     array_push($error_msgs,$error_msg);
        // }
        $emplo = $request->input("employee");
        
        $desc = $request->input("description");
        
        $timestamp_now = Carbon::now("Asia/Jakarta");
        $date_now = $timestamp_now->format("Y-m-d");
        $timestamp_start = Carbon::parse($date,"Asia/Jakarta");
        $difference = $timestamp_start->diffInDays($date_now);
        
        $timestamp_end = Carbon::parse($date." ". $end,"Asia/Jakarta");
        $totalDiff = $timestamp_start->diff($timestamp_end)->format("%H:%I:%S");
        

        $status = Status::ofOvertime()->where('code','open')->first()->id;

        // $status = Status::where('code','PENDING')->first()->id;

        $overtime_data =  [
                "uuid" => Str::uuid(),
                "employee_id" => 3,
                "start" => $timestamp_start,
                "end" => $timestamp_end,
                "date" => $date,
                "desc" => $desc,
                "total" => $totalDiff,
                "statuses_id" => $status,
                "date_diff" => $difference
            ]
        ;

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
        return response()->json($overtime_data);
        // dd($overtime_data);
        // $arr = [$emplo,$start,$end,$date,$desc];
        // if(sizeof($error_msgs) > 0){
        //     return response()->json(['error' => $error_msgs], '403');
        // }
        // dd($arr);
        // return redirect()->route("frontend.overtime.index");
        // $quotation->approvals()->save(new Approval([
        //     'approvable_id' => $quotation->id,
        //     'conducted_by' => Auth::id(),
        //     'note' => $request->note,
        //     'is_approved' => 1
        // ]));
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
}
