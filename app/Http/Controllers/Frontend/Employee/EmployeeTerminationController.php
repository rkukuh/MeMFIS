<?php

namespace App\Http\Controllers\frontend\employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeTermination;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\EmployeeTerminationStore;

class EmployeeTerminationController extends Controller
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
    public function store(EmployeeTerminationStore $request, Employee $employee)
    {
        $employeeTermination = $employee->employee_termination()->create([
            'employee_id' => $employee->id,
            'termination_id' => Employee::where('user_id',Auth::id())->first()->id,
            'termination_date' => $request->termination_date,
            'reason' => $request->reason,
            'remark' => $request->remark
        ]);

        if($request->document){
            $employeeTermination->addMedia($request->document)->toMediaCollection('document_employee_termiantion');
        }

        $employee->delete();

        return response()->json('Sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeTermination  $employeeTermination
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeTermination $employeeTermination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeTermination  $employeeTermination
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeTermination $employeeTermination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeTermination  $employeeTermination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeTermination $employeeTermination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeTermination  $employeeTermination
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeTermination $employeeTermination)
    {
        //
    }
}
