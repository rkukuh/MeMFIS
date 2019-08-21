<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\DefectCard;
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;

class ProjectHMAdditionalController extends Controller
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
    public function create(Project $project)
    {
        $attention = json_decode($project->quotations()->first()->attention);
        return view('frontend.project.hm-additional.create',[
                'project' => $project,
                'attention' => $attention
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project,Request $request)
    {
        $parent_id = $project->id;
        $project = $project->replicate();
        $project->parent_id = $parent_id;
        $project->code = DocumentNumber::generate('PROJ-A-', Project::withTrashed()->count()+1);
        $project->save();
        $defectcard_uuids = explode(",",$request->defectcard_uuid);

        foreach($defectcard_uuids as $defectcard_uuid){
            $defectcard = DefectCard::where('uuid',$defectcard_uuid)->first();
            $defectcard->project_additional_id = $project->id;

            $defectcard->save();

        }

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if($project->quotations->toArray() == []){
            $project_parent = Project::find($project->parent_id);
            $attention = json_decode($project_parent->quotations()->first()->attention);
        }else{
            $attention = json_decode($project_parent->quotations()->first()->attention);
        }
        return view('frontend.project.hm-additional.show',[
            'project' => $project,
            'project_parent' => $project_parent,
            'aircrafts' => $this->aircrafts,
            'customers' => $this->customers,
            'attention' => $attention
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if($project->quotations->toArray() == []){
            $project_parent = Project::find($project->parent_id);
            $attention = json_decode($project_parent->quotations()->first()->attention);
        }else{
            $attention = json_decode($project_parent->quotations()->first()->attention);
        }

        return view('frontend.project.hm-additional.edit',[
            'project' => $project,
            'project_parent' => $project_parent,
            'aircrafts' => $this->aircrafts,
            'customers' => $this->customers,
            'attention' => $attention
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectUpdate  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $defectcard_uuids = explode(",",$request->defectcard_uuid);
        foreach($defectcard_uuids as $defectcard_uuid){
            $defectcard = DefectCard::where('uuid',$defectcard_uuid)->first();
            $defectcard->project_additional_id = $project->id;

            $defectcard->save();

        }

        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project,Request $request)
    {
        $defectcard_uuids = explode(",",$request->defectcard_uuid);

        foreach($defectcard_uuids as $defectcard_uuid){
            // $null = 1;
            $defectcard = DefectCard::where('uuid',$defectcard_uuid)->first();
            $defectcard->project_additional_id = null;

            $defectcard->save();
        }

        return response()->json($project);

    }

    /**
     * Display a summary of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function summary(Project $project)
    {
        $skills = $subset = [];

        $eri = 0;
        
        $defectcards =  DefectCard::where('project_additional_id', $project->id)->get();

        foreach($defectcards as $defectcard){
            if (sizeof($defectcard->skills) > 1) {
                $eri++;
            }else{
                $result = $defectcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });
                
                array_push($subset , $result);
            }
        }
        
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        
        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_defectcard = $defectcards->count();
        $total_estimation_manhours = $defectcards->sum('estimation_manhour');
        return view('frontend.project.hm-additional.summary',[
            'project' => $project,
            'total_defectcard' => $total_defectcard,            
            'otr' => $otr,
            'total_estimation_manhours' => $total_estimation_manhours,
        ]);

    }

    /**
     * Update additional related datas in data_additional field.
     *
     * @param  \App\Http\Requests  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function additionalStore(Request $request, Project $project)
    {
        if(empty($project->data_defectcard)){
            $data_json = [];
            $data_json["total_manhours"] = $request->total_manhours;
            $data_json["performance_factor"] = $request->performance_factor;
            $data_json["total_manhours_with_performance_factor"] = $request->total_manhours_with_performance_factor;

            $data_json = json_encode($data_json, true);
            $project->update(['data_defectcard' => $data_json]);
        }else{
            $data_json = json_decode($project->data_defectcard, true);
            $data_json["total_manhours"] = $request->total_manhours;
            $data_json["performance_factor"] = $request->performance_factor;
            $data_json["total_manhours_with_performance_factor"] = $request->total_manhours_with_performance_factor;

            $data_json = json_encode($data_json, true);
            $project->update(['data_defectcard' => $data_json]);
        }

        return response()->json($project);
    }

}
