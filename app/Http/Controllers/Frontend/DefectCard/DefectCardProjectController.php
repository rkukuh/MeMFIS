<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use App\Models\Project;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefectCardProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.defect-card.project.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function show(Project $defectcard)
    {
        return view('frontend.defect-card.project.show',[
            'project' => $defectcard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $defectCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefectCard $defectCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefectCard $defectCard)
    {
        //
    }
}
