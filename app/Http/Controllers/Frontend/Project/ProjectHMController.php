<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\WorkPackage;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Frontend\ProjectHMStore;
use App\Http\Requests\Frontend\ProjectHMUpdate;

class ProjectHMController extends Controller
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
        return view('frontend.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.project.hm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectHMStore $request)
    {
        $request->merge(['code' => DocumentNumber::generate('PROJ-', Project::withTrashed()->count()+1)]);

        $request->merge(['customer_id' => Customer::where('uuid',$request->customer_id)->first()->id]);

        $project = Project::create($request->all());
        if ($request->hasFile('fileInput')) {
            $destination = 'project/hm/workOrder';
            $fileName = $request->file('fileInput')->getClientOriginalName();
            $fileUpload = Storage::putFileAs($destination,$request->file('fileInput'), $fileName);
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
        return view('frontend.project.hm.show',[
            'project' => $project,
            'aircrafts' => $this->aircrafts,
            'customers' => $this->customers
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
        $attention = $project->quotations;
        return view('frontend.project.hm.edit',[
            'project' => $project,
            'aircrafts' => $this->aircrafts,
            'customers' => $this->customers
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
        $project->update($request->all());
        if ($request->hasFile('fileInput')) {
            $destination = 'project/hm/workOrder';
            $fileName = $request->file('fileInput')->getClientOriginalName();
            $fileUpload = Storage::putFileAs($destination,$request->file('fileInput'), $fileName);
        }

        return response()->json($project);
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
