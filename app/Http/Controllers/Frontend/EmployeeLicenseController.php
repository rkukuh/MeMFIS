<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pivots\EmployeeLicense;
use App\Http\Requests\Frontend\EmployeeLicenseStore;
use App\Http\Requests\Frontend\EmployeeLicenseUpdate;

class EmployeeLicenseController extends Controller
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
     * @param  \App\Http\Requests\Frontend\EmployeeLicenseStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeLicenseStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     */
    public function show(EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     */
    public function edit(EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\EmployeeLicenseUpdate  $request
     * @return \Illuminate\Http\Response
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     */
    public function update(EmployeeLicenseUpdate $request, EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     */
    public function destroy(EmployeeLicense $employeeLicense)
    {
        //
    }
}
