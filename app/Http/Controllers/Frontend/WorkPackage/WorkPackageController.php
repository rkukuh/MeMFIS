<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\Aircraft;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\TaskCard;
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Models\EOInstruction;
use App\Models\Pivots\TaskCardWorkPackage;
use App\Models\Pivots\EOInstructionWorkPackage;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;

class WorkPackageController extends Controller
{
    protected $aircrafts;

    public function __construct()
    {
        $this->aircrafts = Aircraft::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.workpackage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.workpackage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPackageStore $request)
    {
        $request->merge(['code' => DocumentNumber::generate('WPCK-', WorkPackage::withTrashed()->count()+1)]);

        $workpackage = WorkPackage::create($request->all());

        if ($workpackage->is_template == 0 && $request->project_uuid) {
            $project = Project::where('uuid',$request->project_uuid)->first();
            $project->workpackages()->attach($workpackage);
        }

        return response()->json($workpackage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function addTaskCard(Request $request, WorkPackage $workPackage)
    {
        $tc = TaskCard::where('uuid', $request->taskcard)->first();
        $TaskCardWorkPackage = TaskCardWorkPackage::Where('workpackage_id',$workPackage->id)->get();
        $exists = $TaskCardWorkPackage->where('deleted_at',null)->where('taskcard_id',$tc->id)->first();
        if($exists){
            return response()->json(['title' => "Danger"]);
        }else{
            $workPackage->taskcards()->attach(TaskCard::where('uuid', $request->taskcard)->first()->id);

            return response()->json($workPackage);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function addInstruction(Request $request, WorkPackage $workPackage)
    {
        $tc = EOInstruction::where('uuid', $request->taskcard)->first();
        $EOInstructionWorkPackage = EOInstructionWorkPackage::Where('workpackage_id',$workPackage->id)->get();
        $exists = $EOInstructionWorkPackage->where('deleted_at',null)->where('eo_instruction_id',$tc->id)->first();
        if($exists){
            return response()->json(['title' => "Danger"]);
        }else{
            $workPackage->eo_instructions()->attach(EOInstruction::where('uuid', $request->taskcard)->first()->id);

            return response()->json($workPackage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function show(WorkPackage $workPackage)
    {
        return view('frontend.workpackage.show',[
        'workPackage' => $workPackage,
        'aircrafts' => $this->aircrafts,
    ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkPackage $workPackage)
    {
        return view('frontend.workpackage.edit',[
            'workPackage' => $workPackage,
            'aircrafts' => $this->aircrafts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function update(WorkPackageUpdate $request, WorkPackage $workPackage)
    {
        $workPackage->update($request->all());

        return response()->json($workPackage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function sequence(Request $request, WorkPackage $workPackage,TaskCard $taskcard)
    {

        $workPackage->taskcards()->updateExistingPivot($taskcard, ['sequence'=>$request->sequence]);

        return response()->json($workPackage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function sequenceInstruction(Request $request, WorkPackage $workPackage,EOInstruction $instruction)
    {

        $workPackage->eo_instructions()->updateExistingPivot($instruction, ['sequence'=>$request->sequence]);

        return response()->json($workPackage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function mandatory(Request $request, WorkPackage $workPackage, TaskCard $taskcard)
    {

        $workPackage->taskcards()->updateExistingPivot($taskcard, ['is_mandatory'=>$request->is_mandatory]);

        return response()->json($workPackage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkPackageUpdate  $request
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function mandatoryInstruction(Request $request, WorkPackage $workPackage, EOInstruction $instruction)
    {

        $workPackage->eo_instructions()->updateExistingPivot($instruction, ['is_mandatory'=>$request->is_mandatory]);

        return response()->json($workPackage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkPackage $workPackage)
    {
        $workPackage->delete();

        return response()->json($workPackage);
    }

    /**
     * Remove the taskcard from workpackage .
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function deleteTaskCard(WorkPackage $workPackage,TaskCard $taskcard)
    {
        $tc = TaskCardWorkPackage::where('workpackage_id', $workPackage->id)->where('taskcard_id', $taskcard->id)
                ->with('predecessors','successors')->first();

        if($tc->predecessors()->exists()){
            $tc->predecessors()->delete();
        }

        if($tc->successors()->exists()){
            $tc->successors()->delete();
        }

        $tc->delete();

        return response()->json($tc);
    }

    /**
     * Remove the taskcard from workpackage .
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function deleteInstruction(WorkPackage $workPackage,EOInstruction $instruction)
    {
        $eo_instruction = EOInstructionWorkPackage::where('workpackage_id', $workPackage->id)->where('eo_instruction_id', $instruction->id)->first();

        if(sizeof($eo_instruction->predecessors) > 0){
            $eo_instruction->predecessors()->delete();
        }

        if(sizeof($eo_instruction->successors) > 0){
            $eo_instruction->successors()->delete();
        }

        $eo_instruction->delete();

        return response()->json($eo_instruction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function summary(WorkPackage $workPackage)
    {
        $skills = $subset = [];
        $eri = 0;

        $taskcards  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb')
            ->orWhere('code','cmr')->orWhere('code','awl')
            ->orWhere('code','ea')->orWhere('code','eo');
        })->whereNull('eo_instructions.deleted_at')->get();

        foreach($taskcards as $eo_instruction){
            if (sizeof($eo_instruction->skills) > 1) {
                $eri++;
            }else{
                $result = $eo_instruction->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset , $result);
            }
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

        $adsb  = $workPackage->eo_instructions()->with('eo_header.type')
                ->whereHas('eo_header.type', function ($query) {
                    $query->where('code', 'ad')->orWhere('code','sb');
                })->whereNull('eo_instructions.deleted_at')->count();

        $cmrawl  = $workPackage->eo_instructions()->with('eo_header.type')
                ->whereHas('eo_header.type', function ($query) {
                    $query->where('code', 'cmr')->orWhere('code','awl');
                })->whereNull('eo_instructions.deleted_at')->count();

        $ea  = $workPackage->eo_instructions()->with('eo_header.type')
                ->whereHas('eo_header.type', function ($query) {
                    $query->where('code', 'ea');
                })->whereNull('eo_instructions.deleted_at')->count();

        $eo  = $workPackage->eo_instructions()->with('eo_header.type')
                ->whereHas('eo_header.type', function ($query) {
                    $query->where('code', 'eo');
                })->whereNull('eo_instructions.deleted_at')->count();

        $si = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'si');
                })
                ->count();

        $otr["eri"] = $eri;
        $total_taskcard  = $workPackage->taskcards->count('uuid') + $workPackage->eo_instructions->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->sum('estimation_manhour') + $workPackage->eo_instructions->sum('estimation_manhour');

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
        ]);
    }

}
