<?php

namespace App\Http\Controllers\Frontend\Project;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\TaskCard;
use App\Models\Facility;
use App\Models\WorkPackage;
use App\Models\ProjectWorkPackageEngineer;
use App\Models\ProjectWorkPackageTaskCard;
use App\Models\Pivots\ProjectWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;

class ProjectHMWorkPackageTaskCardController extends Controller
{
    protected $aircrafts;
    protected $customers;

    public function __construct()
    {
        $this->aircrafts = Aircraft::all();
        $this->customers = Customer::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Frontend\ProjectStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Project $project, WorkPackage $workpackage, TaskCard $taskcard)
    {
        $project_wokpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',$workpackage->id)->first();

        $project_wokpackage_taskcard = ProjectWorkPackageTaskCard::where('project_workpackage_id',$project_wokpackage->id)->where('taskcard_id',$taskcard->id)->first();

        if($project_wokpackage_taskcard <> null){
            return response()->json(['title' => "Danger"]);
        }else{
            // $workPackage->taskcards()->attach(TaskCard::where('uuid', $request->taskcard)->first()->id);

            $project_wokpackage->taskcards()->create([
                'taskcard_id' => $taskcard->id,
            ]);

            return response()->json($project_wokpackage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, WorkPackage $workPackage,Request $request)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, WorkPackage $workPackage,Request $request)
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function sequence(Request $request, ProjectWorkPackageTaskCard $ProjectWorkpackage)
    {
        $ProjectWorkpackage->update($request->all());

        return response()->json($ProjectWorkpackage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function mandatory(Request $request, ProjectWorkPackageTaskCard $ProjectWorkpackage)
    {
        $ProjectWorkpackage->update($request->all());

        return response()->json($ProjectWorkpackage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function rii(Request $request, ProjectWorkPackageTaskCard $ProjectWorkpackage)
    {
        $ProjectWorkpackage->update($request->all());

        return response()->json($ProjectWorkpackage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectWorkPackageTaskCard $ProjectWorkpackage)
    {
        $ProjectWorkpackage->delete();

        return response()->json($ProjectWorkpackage);
    }


}
