<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\WorkPackage;
use App\Models\Pivots\ProjectWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;

class ProjectHMWorkPackageController extends Controller
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
    public function store(Request $request, Project $project)
    {
        $project->workpackages()->attach(WorkPackage::where('uuid',$request->workpackage)->first()->id);

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, WorkPackage $workPackage)
    {
        // get skill_id(s) from taskcards that are used in workpackage
        // so only required skill will showed up
        $subset = $workPackage->taskcards->map(function ($taskcard) {
            return collect($taskcard->toArray())
                ->only(['skill_id'])
                ->all();
        });

        $skills = [];
        foreach ($subset as $value) {
            array_push($skills, $value["skill_id"]);
        }

        $total_mhrs = $workPackage->taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $workPackage->taskcards->sum('performance_factor');
        $edit = false;
        // dd($skills);
        return view('frontend.project.hm.workpackage.index',[
            'workPackage' => $workPackage,
            'total_mhrs' => $total_mhrs,
            'total_pfrm_factor' => $total_pfrm_factor,
            'edit' => $edit,
            'project' => $project,
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, WorkPackage $workPackage)
    {
        // get skill_id(s) from taskcards that are used in workpackage
        // so only required skill will showed up
        $subset = $workPackage->taskcards->map(function ($taskcard) {
            return collect($taskcard->toArray())
                ->only(['skill_id'])
                ->all();
        });

        $skills = [];
        foreach ($subset as $value) {
            array_push($skills, $value["skill_id"]);
        }
        // TO DO : get all skill from $skills
        $total_mhrs = $workPackage->taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $workPackage->taskcards->sum('performance_factor');
        $edit = true;
        return view('frontend.project.hm.workpackage.index',[
            'workPackage' => $workPackage,
            'total_mhrs' => $total_mhrs,
            'total_pfrm_factor' => $total_pfrm_factor,
            'edit' => $edit,
            'project' => $project,
            'skills' => $skills
        ]);
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
     */
    public function engineerTeam(Project $project, WorkPackage $workpackage,Request $request)
    {
        $pw = ProjectWorkPackage::where('project_id',$project->id)
            ->where('workpackage_id',$workpackage->id)
            ->first();

            dd($pw);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function manhoursPropotion(Project $project, WorkPackage $workpackage,Request $request)
    {
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
            ->where('workpackage_id',$workpackage->id)
            ->first();

        dd($request->skills);

        $project_workpackage->engineer()->create([
            'skill_id' => $facility,
            'engineer_id' => $facility,
            'quantity' => $facility,
        ]);

        return response()->json($project_workpackage->engineer());
        
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function facilityUsed(Project $project, WorkPackage $workpackage,Request $request)
    {
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
            ->where('workpackage_id',$workpackage->id)
            ->first();
        foreach($request->facility_array as $facility){
            $project_workpackage->facilities()->create([
                'facility_id' => $facility,
            ]);

        }

        return response()->json($project_workpackage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, WorkPackage $workPackage)
    {
        $project->workpackages()->detach($workPackage);

        return response()->json($project);
    }

}
