<?php

namespace App\Http\Controllers\Frontend\Project;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\WorkPackage;
use App\Models\TaskCard;
use App\Models\ProjectWorkPackageEngineer;
use App\Models\HtCrr;
use App\Models\Pivots\ProjectWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;

class ProjectHMHtcrrController extends Controller
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
    public function create(Project $project,Request $request)
    {
        $mhrs_pfrm_factor = $skills = $subset = $htcrr_engineers = [];

        $htcrrs = HtCrr::where('code',  'like', 'JCRI%')->where('project_id', $project->id)->get();
      
        foreach($htcrrs as $htcrr){
            $result = $htcrr->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['name'])
                    ->all();
            });

            array_push($subset , $result);
            foreach($htcrr->engineers as $engineer){
                array_push($htcrr_engineers , $engineer);
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["name"]);
            }
        }

        sort($skills);
        $skills = array_unique($skills);

        $total_mhrs = $htcrrs->sum('estimation_manhour');

        $employees = Employee::all();
        $facilities = Facility::all();
        if ($request->anyChanges) {
            $view = 'frontend.project.htcrr.index-engineerteam';
        }else{
            $view = 'frontend.project.htcrr.index';
        }
        return view($view,[
        'project' => $project,
        'employees' => $employees,
        'total_mhrs' => $total_mhrs,
        'facilities' => $facilities,
        'engineer_skills' => $skills,
        'htcrr_engineers' => $htcrr_engineers,
        'skills' => json_encode($skills),
        'mhrs_pfrm_factor' => $mhrs_pfrm_factor,
        ]);
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

        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',WorkPackage::where('uuid',$request->workpackage)->first()->id)->first();
        // // $workPackage = WorkPackage::where('uuid',$request->workpackage)->first();
        foreach($project_workpackage->workpackage->taskcards as $taskcard){

            $project_workpackage->taskcards()->create([
                'taskcard_id' => $taskcard->id,
                'sequence' => $taskcard->pivot->sequence,
                'is_mandatory' => $taskcard->pivot->is_mandatory,
            ]);
        }

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, WorkPackage $workPackage,Request $request)
    {
        $mhrs_pfrm_factor = $skills = $subset = $taskcards = [];

        $htcrrs = HtCrr::where('code',  'like', 'JCRI%')->where('project_id', $project->id)->get();

        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards, $taskcard->taskcard_id);
        }

        $taskcards = TaskCard::whereIn('id',$taskcards)->get(); 

        // get skill_id(s) from taskcards that are used in workpackage
        // so only required skill will showed up
        foreach($taskcards as $taskcard){
            array_push($mhrs_pfrm_factor, $taskcard->estimation_manhour * $taskcard->performance_factor);
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['name'])
                    ->all();
            });

            array_push($subset , $result);
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["name"]);
            }
        }

        sort($skills);
        $skills = array_unique($skills);
        $mhrs_pfrm_factor = array_sum($mhrs_pfrm_factor);
        $total_mhrs = $taskcards->sum('estimation_manhour') + $htcrrs->sum('estimation_manhour');
        $total_pfrm_factor = $taskcards->sum('performance_factor');

        //get employees
        $employees = Employee::all();
        $facilities = Facility::all();

        // $materialCount = $workPackage->items->count();
        // $toolCount = $workPackage->tools->count();
        // dd($workPackage->uuid);

        $view = 'frontend.project.hm.workpackage.show';
        return view($view,[
            'edit' => false,
            'project' => $project,
            'employees' => $employees,
            // 'toolCount' => $toolCount,
            'total_mhrs' => $total_mhrs,
            'facilities' => $facilities,
            'engineer_skills' => $skills,
            'workPackage' => $workPackage,
            'skills' => json_encode($skills),
            // 'materialCount' => $materialCount,
            'mhrs_pfrm_factor' => $mhrs_pfrm_factor,
            'total_pfrm_factor' => $total_pfrm_factor,
            'project_workpackage' => $project_workpackage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, WorkPackage $workPackage,Request $request)
    {
        $mhrs_pfrm_factor = $skills = $subset = $taskcards = [];

        $htcrrs = HtCrr::where('code',  'like', 'JCRI%')->where('project_id', $project->id)->get();
        
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        // get skill_id(s) from taskcards that are used in workpackage
        // so only required skill will showed up
        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards, $taskcard->taskcard_id);
        }
        $taskcards = TaskCard::whereIn('id',$taskcards)->get(); 

        foreach($taskcards as $taskcard){
            array_push($mhrs_pfrm_factor, $taskcard->estimation_manhour * $taskcard->performance_factor);
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['name'])
                    ->all();
            });

            array_push($subset , $result);
        }

        foreach($htcrrs as $htcrr){
            $result = $htcrr->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['name'])
                    ->all();
            });

            array_push($subset , $result);
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["name"]);
            }
        }

        sort($skills);
        $skills = array_unique($skills);

        $mhrs_pfrm_factor = array_sum($mhrs_pfrm_factor);
        $total_mhrs = $taskcards->sum('estimation_manhour') + $htcrrs->sum('estimation_manhour');
        $total_pfrm_factor = $taskcards->sum('performance_factor');

        $employees = Employee::all();
        $facilities = Facility::all();

        // $materialCount = $workPackage->items->count();
        // $toolCount = $workPackage->tools->count();

        if ($request->anyChanges) {
            $view = 'frontend.project.hm.workpackage.index-engineerteam';
        }else{
            $view = 'frontend.project.hm.workpackage.index';
        }
        return view($view,[
            'edit' => true,
            'project' => $project,
            'employees' => $employees,
            // 'toolCount' => $toolCount,
            'total_mhrs' => $total_mhrs,
            'facilities' => $facilities,
            'engineer_skills' => $skills,
            'workPackage' => $workPackage,
            'skills' => json_encode($skills),
            // 'materialCount' => $materialCount,
            'mhrs_pfrm_factor' => $mhrs_pfrm_factor,
            'total_pfrm_factor' => $total_pfrm_factor,
            'project_workpackage' => $project_workpackage,
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
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
            ->where('workpackage_id',$workpackage->id)
            ->first();

        $project_workpackage->update(['tat' =>  $request->tat]);
        for($index = 0 ; $index < sizeof($request->engineer_skills) ; $index++){
            $skill = Type::where('name', 'LIKE', '%' .$request->engineer_skills[$index].'%' )
                            ->where('of','taskcard-skill')->first()->id;
            $engineer = Employee::where('code',$request->engineer[$index])->first()->id;
            $ProjectWorkPackageEngineer = ProjectWorkPackageEngineer::where('project_workpackage_id',$project_workpackage->id)
                    ->where('skill_id',$skill)
                    ->first();
            // return response()->json(isset($ProjectWorkPackageEngineer));

            if(isset($ProjectWorkPackageEngineer)){
                $res = $ProjectWorkPackageEngineer->update([
                    'engineer_id' => $engineer,
                    'quantity' => (int) $request->engineer_qty[$index],
                    ]);
            }else{
                $res = ProjectWorkPackageEngineer::create([
                    'project_workpackage_id' => $project_workpackage->id,
                    'skill_id' => $skill,
                    'engineer_id' => $engineer,
                    'quantity' => (int) $request->engineer_qty[$index],
                ]);
            }
        }

        return response()->json($project_workpackage);
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

        $project_workpackage->update([
            'performance_factor' =>  $request->performa_used,
            'total_manhours' =>  $request->manhour,
            'total_manhours_with_performance_factor' =>  $request->total,
            ]);

        return response()->json($project_workpackage);

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
            
        if(sizeof($project_workpackage->facilities) > 0){
            $project_workpackage->facilities()->delete();
        }

        foreach($request->facility_array as $facility){
            $facility = Facility::where('uuid', $facility)->first()->id;
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
        $project->workpackages()->updateExistingPivot($workPackage,[
            'deleted_at' => Carbon::now()
        ]);

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function summary(Project $project, WorkPackage $workPackage)
    {
        $skills = $subset = [];

        $taskcards  = $workPackage->taskcards->load('type')->whereIn('type.code', ['ad','sb']);
        foreach($taskcards as $taskcard){
            foreach($taskcard->eo_instructions as $eo_instruction){
                $result = $eo_instruction->skills->map(function ($skills) {
                    return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                });
            }

            array_push($subset , $result);
        }

        foreach($workPackage->taskcards as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        $otr = array_count_values($skills);
        $basic = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'basic');
                })
                ->count();
        $sip = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'sip');
                })
                ->count();
        $cpcp = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'cpcp');
                })
                ->count();

        $adsb = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'ad')->orwhere('code', 'sb');
                })
                ->count();
        $cmrawl = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'cmr')->orwhere('code', 'awl');
                })
                ->count();
        $si = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'si');
                })
                ->count();

        $total_taskcard  = $workPackage->taskcards->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->sum('estimation_manhour');

        return view('frontend.workpackage.summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'workPackage' => $workPackage,
            'basic' => $basic,
            'sip' => $sip,
            'cpcp' => $cpcp,
            'adsb' => $adsb,
            'cmrawl' => $cmrawl,
            'otr' => $otr,
            'si' => $si,
        ]);
    }

    /**
     * Sent updated manhours from all the htcrrs
     *
     * @param  \App\Models\HtCrr  $workPackage
     */
    public function getManhours(Project $project){
        
        $data = $mhrs_pfrm_factor = [];

        $htcrrs = HtCrr::where('project_id', $project->id)->whereNull('parent_id')->get();

        foreach($htcrrs as $htcrr){
            array_push($mhrs_pfrm_factor, $htcrr->estimation_manhour * $htcrr->performance_factor);
        }
        
        // $mhrs_pfrm_factor = array_sum($mhrs_pfrm_factor);
        $data["total_mhrs"] = $htcrrs->sum('estimation_manhour');
        $data["mhrs_pfrm_factor"] = ( $htcrrs->sum('estimation_manhour') )* 1.6;
        // $data["mhrs_tc_pfrm_factor"]  = $mhrs_pfrm_factor;
        
        return response()->json($data);
    }
}