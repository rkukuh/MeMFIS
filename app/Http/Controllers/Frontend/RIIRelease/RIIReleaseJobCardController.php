<?php

namespace App\Http\Controllers\Frontend\RIIRelease;

use Auth;
use carbon\Carbon;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Inspection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class RIIReleaseJobCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rii-release.job-card.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCardStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $riirelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCard $riirelease)
    {
        $statuses = Status::ofJobCard()->get();

        $manhours = 0;
        foreach($riirelease->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1 = null;
            foreach($values as $value){
                if($statuses->where('id',$value->status_id)->first()->code <> "open"){
                    if($riirelease->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            $t1 = Carbon::parse($date1);
                            $t2 = Carbon::parse($value->created_at);
                            $diff = $t1->diffInSeconds($t2);
                            $manhours = $manhours + $diff;
                        }
                        $date1 = $value->created_at;
                    }
                }

            }
        }
        $manhours = $manhours/3600;
        $manhours_break = 0;
        foreach($riirelease->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            for($i=0; $i<sizeOf($values->toArray()); $i++){
                if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                    if($riirelease->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            if($i+1 < sizeOf($values->toArray())){
                                $t2 = Carbon::parse($values[$i]->created_at);
                                $t3 = Carbon::parse($values[$i+1]->created_at);
                                $diff = $t2->diffInSeconds($t3);
                                $manhours_break = $manhours_break + $diff;
                            }
                        }
                    }
                }
            }
        }
        $manhours_break = $manhours_break/3600;
        $actual =number_format($manhours-$manhours_break, 2);
        $status = Status::ofJobCard()->where('id',$riirelease->progresses->last()->status_id)->first()->code;

        return view('frontend.rii-release.job-card.create', [
            'taskrelease' => $riirelease,
            'materials' => $riirelease->taskcard->materials,
            'tools' => $riirelease->taskcard->tools,
            'status' => $status,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardUpdate  $request
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, JobCard $riirelease)
    {
        $status = Status::ofJobcard()->where('code','rii-released')->first()->id;

        $riirelease->progresses()->save(new Progress([
            'status_id' => $status,
            'progressed_by' => Auth::id()
        ]));

        $riirelease->inspections()->save(new Inspection([
            'is_rii' => '1',
            'inspected_by' => Auth::id()
        ]));

        $riirelease->approvals()->save(new Approval([
            'approvable_id' => $riirelease->id,
            'approved_by' => Auth::id(),
        ]));

        return response()->json($riirelease);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCard $riirelease)
    {
        //
    }

}
