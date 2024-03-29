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
use App\Models\Pivots\TaskCardWorkPackage;
use App\Models\Pivots\EOInstructionWorkPackage;
use App\Models\HtCrr;
use App\Models\Pivots\ProjectWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;
use App\Models\EOInstruction;
use App\Models\Manhour;
use stdClass;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $workPackage = WorkPackage::where('uuid',$request->workpackage)->first();
        
        $routines = TaskCardWorkPackage::with('taskcard','taskcard.type','taskcard.task')
                        ->where('workpackage_id',$workPackage->id)
                        ->whereNull('deleted_at')
                        ->get();

        $nonroutines = EOInstructionWorkPackage::with('eo_instruction','eo_instruction.eo_header.type','eo_instruction.eo_header.task')
                        ->where('workpackage_id',$workPackage->id)
                        ->whereNull('deleted_at')
                        ->get();

        $project->workpackages()->attach($workPackage->id);
        
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',WorkPackage::where('uuid',$request->workpackage)->first()->id)->first();
        
        foreach($routines as $routine){
            $project_workpackage->taskcards()->create([
                'taskcard_id' => $routine->taskcard->id,
                'is_rii' => $routine->taskcard->is_rii,
                'sequence' => $routine->sequence,
                'is_mandatory' => $routine->is_mandatory,
            ]);
        }
        
        foreach($nonroutines as $eo_instructions){
            $project_workpackage->eo_instructions()->create([
                'eo_instruction_id' => $eo_instructions->eo_instruction->id,
                'is_rii' => $eo_instructions->eo_instruction->is_rii,
                'sequence' => $eo_instructions->sequence,
                'is_mandatory' => $eo_instructions->is_mandatory,
            ]);
        }

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, WorkPackage $workPackage,Request $request)
    {
        $mhrs_pfrm_factor = $skills = $subset = $taskcards_routine = $taskcards_non_routine = $taskcards = $engineers_quantity = [];

        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards_routine, $taskcard->taskcard_id);
        }

        foreach($project_workpackage->eo_instructions as $taskcard){
            array_push($taskcards_non_routine, $taskcard->eo_instruction_id);
        }

        $taskcards_routine = TaskCard::whereIn('id',$taskcards_routine)->get();
        $taskcards_non_routine = EOInstruction::whereIn('id',$taskcards_non_routine)->get();
        $taskcards = $taskcards_routine->merge($taskcards_non_routine);

        // get skill_id(s) from taskcards that are used in workpackage
        // so only required skill will showed up
        $index_skills = Type::ofTaskCardSkill()->get();
        foreach($index_skills as $skill){
            $engineers_quantity[$skill->code] = 0;
        }

        foreach($taskcards as $taskcard){
            array_push($mhrs_pfrm_factor, $taskcard->estimation_manhour * $taskcard->performance_factor);
            if(sizeof($taskcard->skills) > 1){
                $tempArray["name"] = "ERI";
                array_push($subset , $tempArray);
                $engineers_quantity["eri"] += $taskcard->engineer_quantity;
            }else{
                if(sizeof($taskcard->skills) > 0){
                    $engineers_quantity[$taskcard->skills[0]->code] += $taskcard->engineer_quantity; 
                }
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                        ->only(['name'])
                        ->all();
                });
                if(isset($result[0])){
                    array_push($subset , $result[0]);
                }
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill);
            }
        }

        sort($skills);
        $skills = array_unique($skills);
        $mhrs_pfrm_factor = array_sum($mhrs_pfrm_factor);
        $total_mhrs = $taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $taskcards->sum('performance_factor');

        //get employees
        $employees = Employee::all();
        $facilities = Facility::all();

        $view = 'frontend.project.hm.workpackage.show';
        return view($view,[
            'edit' => false,
            'project' => $project,
            'employees' => $employees,
            'total_mhrs' => $total_mhrs,
            'facilities' => $facilities,
            'engineer_skills' => $skills,
            'workPackage' => $workPackage,
            'skills' => json_encode($skills),
            'mhrs_pfrm_factor' => $mhrs_pfrm_factor,
            'total_pfrm_factor' => $total_pfrm_factor,
            'engineers_quantity' => $engineers_quantity,
            'project_workpackage' => $project_workpackage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, WorkPackage $workPackage,Request $request)
    {

        $mhrs_pfrm_factor = $skills = $subset = $taskcards_routine = $taskcards_non_routine = $taskcards = $engineers_quantity = [];

        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        // get skill_id(s) from taskcards that are used in workpackage
        // so only required skill will showed up
        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards_routine, $taskcard->taskcard_id);
        }

        foreach($project_workpackage->eo_instructions as $taskcard){
            array_push($taskcards_non_routine, $taskcard->eo_instruction_id);
        }

        $taskcards_routine = TaskCard::whereIn('id',$taskcards_routine)->get();
        $taskcards_non_routine = EOInstruction::whereIn('id',$taskcards_non_routine)->get();
        $taskcards = $taskcards_routine->merge($taskcards_non_routine);

        $index_skills = Type::ofTaskCardSkill()->get();
        foreach($index_skills as $skill){
            $engineers_quantity[$skill->code] = 0;
        }

        foreach($taskcards as $taskcard){
            array_push($mhrs_pfrm_factor, $taskcard->estimation_manhour * $taskcard->performance_factor);
            if(sizeof($taskcard->skills) > 1){
                $tempArray["name"] = "ERI";
                array_push($subset , $tempArray);
                $engineers_quantity["eri"] += $taskcard->engineer_quantity; 
            }else{
                if(sizeof($taskcard->skills) > 0){
                    $engineers_quantity[$taskcard->skills[0]->code] += $taskcard->engineer_quantity; 
                }
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                        ->only(['name'])
                        ->all();
                });
                if(isset($result[0])){
                    array_push($subset , $result[0]);
                }
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill);
            }
        }

        sort($skills);
        $skills = array_unique($skills);

        $mhrs_pfrm_factor = array_sum($mhrs_pfrm_factor);
        $total_mhrs = $taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $taskcards->sum('performance_factor');

        $employees = Employee::all();
        $facilities = Facility::all();


        if ($request->anyChanges) {
            $view = 'frontend.project.hm.workpackage.index-engineerteam';
        }else{
            $view = 'frontend.project.hm.workpackage.index';
        }
        return view($view,[
            'edit' => true,
            'project' => $project,
            'employees' => $employees,
            'total_mhrs' => $total_mhrs,
            'facilities' => $facilities,
            'engineer_skills' => $skills,
            'workPackage' => $workPackage,
            'skills' => json_encode($skills),
            'mhrs_pfrm_factor' => $mhrs_pfrm_factor,
            'total_pfrm_factor' => $total_pfrm_factor,
            'engineers_quantity' => $engineers_quantity,
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
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function manhoursPropotion(Project $project, WorkPackage $workpackage,Request $request)
    {
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
            ->where('workpackage_id',$workpackage->id)
            ->first();
            
        $manhour_price =   Manhour::first()->rate; 

        $project_workpackage->update([
            'performance_factor' =>  $request->performa_used,
            'total_manhours' =>  $request->manhour,
            'total_manhours_with_performance_factor' =>  $request->total
            ]);

        return response()->json($project_workpackage);

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
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

        $ea  = $workPackage->eo_instructions()->with('eo_header.type')
                ->whereHas('eo_header.type', function ($query) {
                    $query->where('code', 'ea');
                })->whereNull('eo_instructions.deleted_at')->count();
        
        $eo  = $workPackage->eo_instructions()->with('eo_header.type')
                ->whereHas('eo_header.type', function ($query) {
                    $query->where('code', 'eo');
                })->whereNull('eo_instructions.deleted_at')->count();

        $preliminary = $workPackage->taskcards->load('type')->where('type.code', 'preliminary')->count('uuid');

                
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
            'ea' => $ea,
            'eo' => $eo,
            'preliminary' => $preliminary,
        ]);
    }

    /**
     * Sent updated manhours on that workpackage
     *
     * @param  \App\Models\WorkPackage  $workPackage
     */
    public function getManhours(Project $project, WorkPackage $workPackage){

        $data = $mhrs_pfrm_factor = $taskcards_routine = $taskcards_non_routine = $taskcards = [];

        $project_workpackage = ProjectWorkPackage::where('project_id', $project->id)
                    ->where('workpackage_id', $workPackage->id)->first();

        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards_routine, $taskcard->taskcard_id);
        }

        foreach($project_workpackage->eo_instructions as $taskcard){
            array_push($taskcards_non_routine, $taskcard->eo_instruction_id);
        }

        $taskcards_routine = TaskCard::whereIn('id',$taskcards_routine)->get();
        $taskcards_non_routine = EOInstruction::whereIn('id',$taskcards_non_routine)->get();
        $taskcards = $taskcards_routine->merge($taskcards_non_routine);

        foreach($taskcards as $taskcard){
            array_push($mhrs_pfrm_factor, $taskcard->estimation_manhour * $taskcard->performance_factor);
        }

        $mhrs_pfrm_factor = array_sum($mhrs_pfrm_factor);
        $data["total_mhrs"] = $taskcards->sum('estimation_manhour');
        $data["mhrs_pfrm_factor"] = ( $taskcards->sum('estimation_manhour') )* 1.6;
        $data["mhrs_tc_pfrm_factor"]  = $mhrs_pfrm_factor;
        return response()->json($data);
    }
}
