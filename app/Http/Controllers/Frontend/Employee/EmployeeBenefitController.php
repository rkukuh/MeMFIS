<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Employee;
use App\Models\EmployeeBenefit;
use App\Models\EmployeeBPJS;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\EmployeeBenefitUpdate;
use App\Http\Controllers\Controller;

class EmployeeBenefitController extends Controller
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
     * @param  \App\Models\EmployeeBenefit  $employeeBenefit
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBenefit $employeeBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeBenefit  $employeeBenefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeBenefit  $employeeBenefit
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeBenefitUpdate $request,Employee $employee)
    {
     //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeBenefit  $employeeBenefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeBenefit $employeeBenefit)
    {
        //
    }
}
