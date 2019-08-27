<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Workshift;
use App\Models\WorkshiftSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkshiftStore;
use App\Http\Requests\Frontend\WorkshiftUpdate;

class WorkshiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.workshift-schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.workshift-schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshiftStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkshiftStore $request)
    {
        // $workshift = Workshift::create([
        //     'code' => $request->code,
        //     'name' => $request->name,
        //     'description' => $request->description,
        // ]);

        // $id = Workshift::where('uuid',$workshift->uuid)->first()->id; 

        // if(isset($request->days)){
        //     for($i=0; $i<count($request->days); $i++){
        //         WorkshiftSchedule::create([
        //             'workshift_id' => $id,
        //             'days' => $request->days[$i],
        //             'in' => $request->in[$i],
        //             'break_in' => $request->break_in[$i],
        //             'break_out' => $request->break_out[$i],
        //             'out' => $request->out[$i]
        //         ]);
        //         }
        // }
        return response()->json($request->days);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function show(Workshift $workshift)
    {
        $schedule = $workshift->workshift_schedules()->get();
      
        return view('frontend.workshift-schedule.show',['workshift' => $workshift,'schedule' => $schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshift $workshift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshiftUpdate  $request
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function update(WorkshiftUpdate $request, Workshift $workshift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshift $workshift)
    {
        //
    }
}
