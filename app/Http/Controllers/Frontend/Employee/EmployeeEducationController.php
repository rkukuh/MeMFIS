<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Requests\Frontend\EmployeeEducationStore;
use App\Http\Requests\Frontend\EmployeeEducationUpdate;
use App\Models\Employee;
use App\Models\Type;
use App\Models\EmployeeSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class EmployeeEducationController extends Controller
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
    public function store(EmployeeEducationStore $request,Employee $employee)
    {
        $employee_school = $employee->employee_school()->create([
            'uuid' => Str::uuid(),
            'degree' => Type::where('uuid',$request->qualification)->first()->id,
            'institute' => $request->institute,
            'field_of_study' => $request->field_of_study,
            'graduated_at' => $request->graduation_date
        ]);
        
        if($request->document){
            $employee_school->addMedia($request->document)->toMediaCollection('document_employee_'.Type::where('uuid',$request->qualification)->first()->code);
        }
        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $education = EmployeeSchool::where('uuid',$request->education)->first();
        $media = null;
        if(isset($education->getMedia('')->first()->name)){
            $media = $education->getMedia('')->first()->file_name;
        }

        return response()->json(['data' => $education, 'media' => $media]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeEducationUpdate $request)
    {
        $education = EmployeeSchool::where('uuid',$request->education)->first();
        $education->update([
            'degree' => Type::where('uuid',$request->qualification)->first()->id,
            'institute' => $request->institute,
            'field_of_study' => $request->field_of_study,
            'graduated_at' => $request->graduation_date
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $education = EmployeeSchool::where('uuid',$request->education)->first();

        $education->media->each->delete();
        $education->delete();

        return response()->json($education);
    }

    public function update_file(Request $request){
        $rules = array(
            'document' => 'image|nullable'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(['errors' => 'File not a image and not be stored!']);
        }else{
            $education = EmployeeSchool::where('uuid',$request->education)->first();
        
            $education->media->each->delete();
            $education->addMedia($request->document)->toMediaCollection('document_employee_'.Type::where('id',$education->degree)->first()->code);
        }   
        
    }
}
