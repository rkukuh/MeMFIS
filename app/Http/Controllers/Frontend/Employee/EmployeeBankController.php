<?php

namespace App\Http\Controllers\Frontend\Employee;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmployeeBankStore;
use App\Http\Requests\Frontend\EmployeeBankUpdate;
use App\Models\Employee;
use App\Models\Bank;
use Carbon\Carbon;

class EmployeeBankController extends Controller
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
    public function store(EmployeeBankStore $request,Employee $employee)
    {

        if($employee->last_name == $employee->first_name){
            $name = $employee->first_name; 
        }else{
            $name = $employee->first_name.' '.$employee->last_name;
        }
        $save = $employee->bank_accounts()->create([
            'number' => $request->account_number,
            'name' => $name,
            'bank_id' => Bank::where('uuid',$request->bank_name)->first()->id,
            'updated_at' => null
        ]);
        
        return response()->json($save);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeBank $employeeBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeBank $employeeBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeBankUpdate $request, Employee $employee)
    {
        $time = Carbon::now();
        
        $employee->bank_accounts()->whereNull('bank_accounts.updated_at')->update([
            'updated_at' => $time
        ]);

        if($employee->last_name == $employee->first_name){
            $name = $employee->first_name; 
        }else{
            $name = $employee->first_name.' '.$employee->last_name;
        }

        $save = $employee->bank_accounts()->create([
            'number' => $request->account_number,
            'name' => $name,
            'bank_id' => Bank::where('uuid',$request->bank_name)->first()->id,
            'created_at' => $time,
            'updated_at' => null
        ]);

        return response()->json($save);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeBank  $employeeBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeBank $employeeBank)
    {
        //
    }
}
