<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pivots\EmployeeLicense;
use App\Http\Requests\Admin\EmployeeLicenseStore;
use App\Http\Requests\Admin\EmployeeLicenseUpdate;

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
     * @param  \App\Http\Requests\Admin\EmployeeLicenseStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeLicenseStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\EmployeeLicenseUpdate  $request
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeLicenseUpdate $request, EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLicense $employeeLicense)
    {
        //
    }
}
