<?php

namespace App\Http\Controllers\Frontend;

use App\Models\DefectCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DefectCardStore;
use App\Http\Requests\Frontend\DefectCardUpdate;

class DefectCardController extends Controller
{
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
     * @param  \App\Http\Requests\Frontend\DefectCardStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DefectCardStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $defectCard)
    {
        //
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
     * @param  \App\Http\Requests\Frontend\DefectCardUpdate  $request
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function update(DefectCardUpdate $request, DefectCard $defectCard)
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
