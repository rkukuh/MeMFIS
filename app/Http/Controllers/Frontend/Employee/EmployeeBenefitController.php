<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Employee;
use App\Models\EmployeeBenefit;
use App\Models\EmployeeBPJS;
use App\Models\Benefit;
use App\Models\EmployeeProvisions;
use Carbon\Carbon;
use App\Http\Requests\Frontend\EmployeeBenefitStore;
use App\Http\Requests\Frontend\EmployeeBenefitUpdate;
use App\Http\Controllers\Controller;
use App\Models\BPJS;

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
     * @param  App\Http\Request\Frontend\EmployeeBenefitStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeBenefitStore $request,Employee $employee)
    {
        $time = Carbon::now();

        for($i=0; $i<count($request->uuid_benefit); $i++){
            $employee->employee_benefit()->create([
                'benefit_id' => Benefit::where('uuid',$request->uuid_benefit[$i])->first()->id,
                'amount' => $request->amount[$i],
                'created_at' => $time,
                'updated_at' => null,
            ]);
        }

        for($j=0; $i<count($request->uuid_bpjs); $j++){
            $employee->employee_bpjs()->create([
                'bpjs_id' => BPJS::where('uuid',$request->uuid_bpjs[$j])->first()->id,
                'employee_paid' => $request->employee_paid[$j],
                'employee_min_value' => $request->employee_min[$j],
                'employee_max_value' => $request->employee_max[$j],
                'company_paid' => $request->company_paid[$j],
                'company_min_value' => $request->company_min[$j],
                'company_max_value' => $request->company_max[$j],
                'created_at' => $time,
                'updated_at' => null
            ]);
        }

        $employee->employee_provisions()->create([
            'maximum_overtime' => $request->maximum_overtime,
            'minimum_overtime' => $request->minimum_overtime,
            'holiday_overtime' => $request->holiday_overtime,
            'pph' => $request->pph,
            'late_tolerance' => $request->late_tolerance,
            'late_punishment' => $request->late_punishment,
            'absence_punishment' => $request->absence_punishment,
            'created_at' => $time,
            'updated_at' => null
        ]);
        
        return response()->json('Sukses');
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
     * @param  App\Http\Request\Frontend\EmployeeBenefitUpdate  $request
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
