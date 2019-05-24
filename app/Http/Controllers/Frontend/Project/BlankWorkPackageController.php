<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Project;
use App\Models\ListUtil;
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;

class BlankWorkPackageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Http\Requests\Frontend\WorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPackageStore $request,Project $project)
    {
        $workpackage = WorkPackage::create($request->all());
        $project->workpackages()->attach($workpackage);

        return response()->json($workpackage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function show(WorkPackage $workPackage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, WorkPackage $workPackage)
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
    public function update(WorkPackageUpdate $request, WorkPackage $workPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkPackage $workPackage)
    {
        //
    }

    /**
     * Remove the taskcard from workpackage .
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function deleteTaskCard(WorkPackage $workPackage,TaskCard $taskcard)
    {
        //
    }

}
