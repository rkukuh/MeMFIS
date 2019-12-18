<?php

namespace App\Http\Controllers\Frontend\ReleaseToService;

use Auth;
use App\User;
use App\Models\RTS;
use App\Models\Status;
use App\Models\Project;
use App\Models\JobCard;
use App\Models\Progress;
use App\Models\Approval;
use App\Models\Quotation;
use App\Models\DefectCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RTSStore;
use App\Http\Requests\Frontend\RTSUpdate;

class RTSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RTSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RTSStore $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function show(RTS $rts)
    {
        $projects = Project::all();
        $project = Project::find($rts->project_id);

        return view('frontend.rts.edit', [
            'rts' => $rts,
            'projec' => $project,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function edit(RTS $rts)
    {
        $projects = Project::all();

        // dd($rts);
        return view('frontend.rts.edit', [
            'rts' => $rts,
            'projects' => $projects
        ]);
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
        //
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function print(RTS $rts)
    {
        $username = Auth::user()->name;
        $created_by = User::find($rts->project->audits->first()->user_id)->name;

        $work_perfor = explode(".",$rts->work_performed);

        $quotations = Quotation::where('quotationable_id',$rts->project->id)->get();

        $taskcard_number = "";
        foreach($quotations as $quotation){
            $jobcards = JobCard::where('quotation_id',$quotation->id)->get();
            foreach($jobcards as $jobcard){
                if(sizeof($jobcard->progresses) <> 0){
                    if(Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "released"){
                        if($jobcard->jobcardable_type == "App\Models\TaskCard"){
                            $taskcard_number = $taskcard_number.", ".$jobcard->jobcardable->number;
                        }else if($jobcard->jobcardable_type == "App\Models\EOInstruction"){
                            $taskcard_number = $taskcard_number.", ".$jobcard->jobcardable->eo_header->number;
                        }
                    }
                }
            }
        }

        $taskcard_number = substr($taskcard_number, 2);

        $pdf = \PDF::loadView('frontend/form/rts_certificate',[
                'username' => $username,
                'rts' => $rts,
                'work_perfor' => $work_perfor,
                'created_by' => $created_by,
                'exceptions' => $taskcard_number,
                ]);
        return $pdf->stream();
    }

    /**
     * Approval of releaste to service for a project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function approve(Project $project)
    {
        // $quotations = Quotation::where('quotationable_id',$project->id)->get();

        // $taskcard_number = "";
        // $defectcard_number = "";
        // $running_taskcard = "";
        // $running_defectcard = "";
        // $mandatory_taskcard = "";
        // foreach($quotations as $quotation){
        //     $jobcards = JobCard::where('quotation_id',$quotation->id)->get();
        //     foreach($jobcards as $jobcard){
        //         if($jobcard->is_mandatory == 1){
        //             if($jobcard->is_rii == 1){
        //                 if(Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "rii-released"){
        //                     $mandatory_taskcard = $mandatory_taskcard.", ".$jobcard->jobcardable->number;
        //                 }
        //             }else{
        //                 if(Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "released"){
        //                     $mandatory_taskcard = $mandatory_taskcard.", ".$jobcard->jobcardable->number;
        //                 }
        //             }
        //         }else{
        //             if($jobcard->is_rii == 1){
        //                 if(Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "rii-released" and Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "open"){
        //                     $running_taskcard = $running_taskcard.", ".$jobcard->jobcardable->number;
        //                 }
        //             }else{
        //                 if(Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "released" and Status::where('id',$jobcard->progresses->last()->status_id)->first()->code <> "open"){
        //                     $running_taskcard = $running_taskcard.", ".$jobcard->jobcardable->number;
        //                 }
        //             }
        //         }
        //         if(sizeof($jobcard->progresses) <> 0){
        //             if( Status::where('id',$jobcard->progresses->last()->status_id)->first()->code == "open"){
        //                 if($jobcard->jobcardable_type == "App\Models\TaskCard"){
        //                     $taskcard_number = $taskcard_number.", ".$jobcard->jobcardable->number;
        //                 }else if($jobcard->jobcardable_type == "App\Models\EOInstruction"){
        //                     $taskcard_number = $taskcard_number.", ".$jobcard->jobcardable->eo_header->number;
        //                 }
        //             }
        //         }
        //     }

        //     $childs = $quotation->childs;
        //         foreach($childs as $child){
        //             $defectcards = DefectCard::where('quotation_additional_id',$child->id)->get();
        //             foreach($defectcards as $defectcard){
        //                 if($defectcard->is_rii == 1){
        //                     if(Status::where('id',$defectcard->progresses->last()->status_id)->first()->code <> "rii-released" and Status::where('id',$defectcard->progresses->last()->status_id)->first()->code <> "open"){
        //                         $running_defectcard = $running_defectcard.", ".$defectcard->code;
        //                     }
        //                 }else{
        //                     if(Status::where('id',$defectcard->progresses->last()->status_id)->first()->code <> "released" and Status::where('id',$defectcard->progresses->last()->status_id)->first()->code <> "open"){
        //                         $running_defectcard = $running_defectcard.", ".$defectcard->code;
        //                     }
        //             }
        //         }
        //     }
        // }

        // if($mandatory_taskcard <> ""){
        //     $error_notification = array(
        //         'message' => "Mandatory is required done",
        //         'title' => "Danger",
        //         'alert-type' => "error"
        //     );

        //     return response()->json(['error' => $error_notification], '403');
        // }
        // if($running_taskcard <> ""){
        //     $error_notification = array(
        //         'message' => "There are jobcard running",
        //         'title' => "Danger",
        //         'alert-type' => "error"
        //     );

        //     return response()->json(['error' => $error_notification], '403');
        // }
        // if($running_defectcard <> ""){
        //     $error_notification = array(
        //         'message' => "There are defectcard running",
        //         'title' => "Danger",
        //         'alert-type' => "error"
        //     );

        //     return response()->json(['error' => $error_notification], '403');
        // }

        $project->progresses()->save(new Progress([
            'status_id' =>  Status::where('code','rts')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        $project->approvals()->save(new Approval([
            'approvable_id' => $project->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($project->progresses->last());
    }
}
