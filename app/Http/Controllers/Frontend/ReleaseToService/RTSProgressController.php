<?php

namespace App\Http\Controllers\Frontend\ReleaseToService;

use Auth;
use App\Models\RTS;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Project;
use App\Models\Progress;
use App\Models\Quotation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RTSStore;
use App\Http\Requests\Frontend\RTSUpdate;

class RTSProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rts.progress');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        if(RTS::where('project_id',$project)->first() <> null){
            $this->edit(RTS::where('project_id',$project)->first()->uuid);
        }
        else{
            $projects = Project::all();
            $rts = RTS::where('project_id',$project->id)->first();
            return view('frontend.rts.create', [
                'rts' => $rts,
                'projec' => $project,
                'projects' => $projects
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RTSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RTSStore $request)
    {
        $request->merge(['work_performed' => $request->work_performed.'.'.$request->work_performed_addtional ]);

        $quotations = Quotation::where('project_id',$request->project_id)->get();

        $taskcard_number = "";
        foreach($quotations as $quotation){
            $jobcards = JobCard::where('quotation_id',$quotation->id)->get();
            foreach($jobcards as $jobcard){
                if(sizeof($jobcard->progresses) <> 0){
                    if(Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "closed"){
                        $taskcard_number = $taskcard_number.", ".$jobcard->taskcard->number;
                    }
                }
            }
        }

        $taskcard_number = substr($taskcard_number, 2);

        $request->merge(['exception' => $taskcard_number ]);

        $rts = RTS::create($request->all());

        if($request->approval <> null){
            $rts->approvals()->save(new Approval([
                'approvable_id' => $rts->id,
                'approved_by' => Auth::id(),
            ]));
        }

        $project = Project::find($request->project_id);
        $project->progresses()->save(new Progress([
            'status_id' =>  Status::where('code','rts')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        return response()->json($rts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function show(RTS $rts)
    {
        return view('frontend.rts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RTSUpdate  $request
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function update(RTSUpdate $request, RTS $rts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function destroy(RTS $rts)
    {
        $rts->delete();

        return response()->json($rts);
    }

}
