<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\EmployeeWorkshift;
use App\Models\Employee;
use App\Models\Workshift;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmployeeWorkshiftStore;
use App\Http\Requests\Frontend\EmployeeWorkshiftUpdate;

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

        $employee->workshifts()->attach([
            'workshift_id' => $workshift,
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
    public function update(EmployeeWorkshiftUpdate $request, Employee $employee, Workshift $workshift)
    {
        $history_data = $employee->workshifts->first();

        // dd($history_data->name);
        $update = $employee->workshifts()->updateExistingPivot($history_data->id, [
            'deleted_at' => Carbon::now(),
        ]);
        if($update){
            $res = $employee->workshift_histories()->create([
                'user_id' => Auth::id(),
                'history_data' => json_encode($history_data),
                'table_name' => 'employee_workshift'
            ]);  
            
            
            $employee->workshifts()->attach( $workshift->id);
        }

        return response()->json($employee->workshifts->last());
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
