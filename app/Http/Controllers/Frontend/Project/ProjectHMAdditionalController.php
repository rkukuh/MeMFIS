<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
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
        // $defectcard_uuid = explode(",",$request->defectcard_uuid);
        // dd($defectcard_uuid);
        $parent_id = $project->id;
        $project = $project->replicate();
        $project->parent_id = $parent_id;
        $project->save();

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
            $project = Project::find($project->parent_id);
            $attention = json_decode($project->quotations()->first()->attention);
        }else{
            $attention = json_decode($project->quotations()->first()->attention);
        }
        return view('frontend.project.hm-additional.show',[
            'project' => $project,
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
            $project = Project::find($project->parent_id);
            $attention = json_decode($project->quotations()->first()->attention);
        }else{
            $attention = json_decode($project->quotations()->first()->attention);
        }
        return view('frontend.project.hm-additional.edit',[
            'project' => $project,
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
    public function update(ProjectHMUpdate $request, Project $project)
    {
        // $project->update($request->all());
        // if ($request->hasFile('fileInput')) {
        //     $destination = 'project/hm/workOrder';
        //     $fileName = $request->file('fileInput')->getClientOriginalName();
        //     $fileUpload = Storage::putFileAs($destination,$request->file('fileInput'), $fileName);
        // }

        // return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

}
