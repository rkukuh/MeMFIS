<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\EmployeeWorkshift;
use App\Models\Employee;
use App\Models\Workshift;
use App\Http\Requests\Frontend\EmployeeWorkshiftStore;
use App\Http\Requests\Frontend\EmployeeWorkshiftUpdate;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class EmployeeWorkshiftController extends Controller
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
    public function store(EmployeeWorkshiftStore $request,Employee $employee)
    {
        $workshift = Workshift::where('uuid',$request->workshift)->first()->id;

        $employee->workshift()->create([
            'workshift_id' => $workshift,
            'updated_at' => null,
        ]);

        return response()->json($workshift);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeWorkshift  $employeeWorkshift
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeWorkshift $employeeWorkshift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeWorkshift  $employeeWorkshift
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeWorkshift $employeeWorkshift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeWorkshift  $employeeWorkshift
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeWorkshiftUpdate $request, Employee $employee)
    {
        $workshift = Workshift::where('uuid',$request->workshift)->first()->id;
        
        $time = Carbon::now();

        $employee->workshift()->whereNull('employee_workshift.updated_at')->update([
            'updated_at' => $time,
        ]);
        
        $employee->workshift()->create([
            'workshift_id' => $workshift,
            'created_at' => $time,
            'updated_at' => null,
        ]);
        return response()->json($workshift);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeWorkshift  $employeeWorkshift
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeWorkshift $employeeWorkshift)
    {
        //
    }
}
