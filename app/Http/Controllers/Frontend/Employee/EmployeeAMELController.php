<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Amel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AmelStore;
use App\Http\Requests\Frontend\AmelUpdate;

class EmployeeAMELController extends Controller
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
     * @param  \App\Http\Requests\Frontend\AmelStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmelStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amel  $amel
     * @return \Illuminate\Http\Response
     */
    public function show(Amel $amel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amel  $amel
     * @return \Illuminate\Http\Response
     */
    public function edit(Amel $amel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AmelUpdate  $request
     * @param  \App\Models\Amel  $amel
     * @return \Illuminate\Http\Response
     */
    public function update(AmelUpdate $request, Amel $amel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amel  $amel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amel $amel)
    {
        //
    }
}
