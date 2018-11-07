<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CertificationEmployee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CertificationEmployeeStore;
use App\Http\Requests\Frontend\CertificationEmployeeUpdate;

class CertificationEmployeeController extends Controller
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
     * @param  \App\Http\Requests\Frontend\CertificationEmployeeStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationEmployeeStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\CertificationEmployeeUpdate  $request
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(CertificationEmployeeUpdate $request, CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationEmployee $certificationEmployee)
    {
        //
    }
}
