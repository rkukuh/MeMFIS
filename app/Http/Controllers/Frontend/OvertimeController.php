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
        $start_diff = Carbon::parse($date." ".$start,"Asia/Jakarta");
        $end_diff = Carbon::parse($date." ".$end,"Asia/Jakarta");
        $time_diff = $start_diff->diff($end_diff)->format("%H:%I:%S");
        $desc = $request->input("description");
        // $timestamp_start = Carbon::parse($date." ".$start,"Asia/Jakarta");
        // $timestamp_end = Carbon::parse($date." ". $end,"Asia/Jakarta");
        // ->format("%H:%I:%S")
        
        $status = Status::ofOvertime()->where('code','open')->first()->id;

        Overtime::create([
                "uuid" => Str::uuid(),
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
        $theOvertime = Overtime::findOrFail($overtime->id);
        // $status_data = $overtime->statuses()->first()->name;
        $employee_data = $overtime->employee()->first()->first_name. " - " . $overtime->employee()->first()->code;
        // $total_in_diff = Carbon::parse($overtime->total,"Asia/Jakarta")->format("%H %I %S");
        $date = $overtime->date;
        $start = $overtime->start;
        $end = $overtime->end;
        $start_diff = Carbon::parse($date." ".$start,"Asia/Jakarta");
        $end_diff = Carbon::parse($date." ".$end,"Asia/Jakarta");
        $total_in_diff = $start_diff->diff($end_diff)->format("%H Hours %I Minutes %S Seconds");
        $approved_by = "-";
        $remark_note = "-";
        $job = "-";
        $is_approved = $overtime->approvals->last();
        $approval_stat = "Pending";
        if ($is_approved != null) {
            if ($is_approved->is_approved == 1) {
                $approval_stat = "Approved";
            }else{
                $approval_stat = "Rejected";
            }
            $approved_by = $is_approved->conductedby->first_name. " - " .$is_approved->created_at;
            $remark_note = $is_approved->note;
            $job = $is_approved->conductedby->user->roles->first()->name;
        }
        $approval_detail = [$approval_stat,$approved_by,$job,$remark_note];
        
        // error_log("WOI ".$overtime->uuid);
        // return view("frontend.overtime.show",["overtime" => $overtime, "employee" => $employee_data]);\
        return response()->json(["overtime" => $overtime,"employee" => $employee_data,"total_diff" => $total_in_diff,"approval_detail" => $approval_detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Overtime  $overtime
     * @return \Illuminate\Http\Response
     */
    public function edit(Overtime $overtime)
    {
        $theOvertime = Overtime::findOrFail($overtime->id);
        $employee_data = $overtime->employee()->first()->code." - ".$overtime->employee()->first()->first_name;
        $employee_uuid = $overtime->employee()->first()->uuid;
        return view("frontend.overtime.edit",["overtime" => $overtime,"employee" => $employee_data,"employee_uuid" => $employee_uuid]);
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
        // dd($request->validated());
        $overtime_data = Overtime::findOrFail($overtime->id);
        $validated = $request->validated();
        
        $isAdmin = Auth::user()->hasRole("admin");
        $employee_id = Auth::id();
        if ($isAdmin) {
            $uuid = $validated["search-journal-val"];
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

    public function approve()
    {
        // dd($data);
        // error_log("MLEBU COI");
        return response()->json(["test" => "WKWKWK"]);
        // $overtime->approvals()->save(new Approval([
        //     'approvable_id' => $overtime->id,
        //     'conducted_by' => Auth::id(),
        //     'note' => $request->note,
        //     'is_approved' => 1
        // ]));
    }
}
