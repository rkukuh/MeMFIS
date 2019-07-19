<?php

namespace App\Http\Controllers\Frontend\ReleaseToService;

use Auth;
use App\Models\RTS;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RTSStore;
use App\Http\Requests\Frontend\RTSUpdate;

class RTSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rts.index');
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
     * @param  \App\Http\Requests\Frontend\RTSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RTSStore $request)
    {
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function show(RTS $rts)
    {
        $projects = Project::all();
        $project = Project::find($rts->project_id);

        return view('frontend.rts.edit', [
            'rts' => $rts,
            'projec' => $project,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RTSUpdate  $request
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function update(RTSUpdate $request, RTS $rts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RTS  $rts
     * @return \Illuminate\Http\Response
     */
    public function destroy(RTS $rts)
    {
        //
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function print(RTS $rts)
    {
        $username = Auth::user()->name;

        $pdf = \PDF::loadView('frontend/form/rts_certificate',[
                'username' => $username,
                'rts' => $rts,

                ]);
        return $pdf->stream();
    }
}
