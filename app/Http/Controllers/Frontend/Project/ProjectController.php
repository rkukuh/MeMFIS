<?php

namespace App\Http\Controllers\Frontend\Project;

use Auth;
use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\Approval;
use App\Models\WorkPackage;
use App\Models\ProjectWorkPackageEngineer;
use App\Models\ProjectWorkPackageFacility;
use App\Models\ProjectWorkPackageManhour;
use App\Models\ProjectWorkPackageTaskCard;
use App\Http\Controllers\Controller;
use App\Models\Pivots\ProjectWorkPackage;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectHMStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $project = Project::with('customer')->where('uuid',$project)->first();

        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectUpdate  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjecHMtUpdate $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json($project);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function approve(Project $project)
    {
        $error_messages = [];
        $total_manhours = ProjectWorkPackage::where('project_id',$project->id)
            ->pluck('total_manhours');

        $tat = ProjectWorkPackage::where('project_id',$project->id)
        ->pluck('tat');

        if(in_array(null, $total_manhours->toArray(), true)){
            $error_message = array(
                'message' => "some of workpackage total manhours hasn't been filled yet",
                'title' => $project->number,
                'alert-type' => "error"
            );
            return response()->json(['error' => $error_messages], '403');
        }

        if(in_array(null, $tat->toArray(), true)){
            $error_message = array(
                'message' => "some of workpackage TAT hasn't been calculated yet",
                'title' => $project->number,
                'alert-type' => "error"
            );
            return response()->json(['error' => $error_messages], '403');
        }

        $pw_json = $project->workpackages->toJson();

        $pw = ProjectWorkPackage::where('project_id',$project->id)->pluck('id');

        $pwe = ProjectWorkPackageEngineer::whereIn('project_workpackage_id',$pw)->get();
        $pwe_json = $pwe->toJson();

        $pwf = ProjectWorkPackageFacility::whereIn('project_workpackage_id',$pw)->get();
        $pwf_json = $pwf->toJson();

        $pwm = ProjectWorkPackageManhour::whereIn('project_workpackage_id',$pw)->get();
        $pwm_json = $pwm->toJson();

        $pwt = ProjectWorkPackageTaskCard::whereIn('project_workpackage_id',$pw)->get();
        $pwt_json = $pwt->toJson();

        $project->origin_parent_project = $project->toJson();
        $project->origin_project_workpackages = $pw_json;
        $project->origin_project_workpackage_engineers = $pwe_json;
        $project->origin_project_workpackage_facilities = $pwf_json;
        $project->origin_project_workpackage_manhours = $pwm_json;
        $project->origin_project_workpackage_taskcards = $pwt_json;
        $project->save();

        $project->approvals()->save(new Approval([
            'approvable_id' => $project->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($project);
    }

}
