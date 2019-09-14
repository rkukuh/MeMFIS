<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Employee;
use App\Http\Requests\Frontend\EmployeeProfileStore;
use App\Http\Controllers\Controller;

class EmployeeProfileController extends Controller
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
    public function store(EmployeeProfileStore $request,Employee $employee)
    {

        if(!isset($request->file_input_1) && !isset($request->file_input_2) && !isset($request->file_input_3) && !isset($request->file_input_4)){
                $active = $employee->getFirstMedia('photo_profile_active')->getUrl();
                
                //Set change active picture
                if(!$employee->getFirstMedia('photo_profile_1')){
                    $employee->addMediaFromUrl($active)->toMediaCollection('photo_profile_1');
                }else if(!$employee->getFirstMedia('photo_profile_2')){
                    $employee->addMediaFromUrl($active)->toMediaCollection('photo_profile_2');
                }else if(!$employee->getFirstMedia('photo_profile_3')){
                    $employee->addMediaFromUrl($active)->toMediaCollection('photo_profile_3');
                }else if(!$employee->getFirstMedia('photo_profile_4')){
                    $employee->addMediaFromUrl($active)->toMediaCollection('photo_profile_4');
                }

                if($request->active == 1){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->addMediaFromUrl($employee->getFirstMedia('photo_profile_1')->getUrl())->toMediaCollection('photo_profile_active');
                    $employee->media->where('collection_name','photo_profile_1')->each->delete();
                }else if($request->active == 2){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->addMediaFromUrl($employee->getFirstMedia('photo_profile_2')->getUrl())->toMediaCollection('photo_profile_active');
                    $employee->media->where('collection_name','photo_profile_2')->each->delete();
                }else if($request->active == 3){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->addMediaFromUrl($employee->getFirstMedia('photo_profile_3')->getUrl())->toMediaCollection('photo_profile_active');
                    $employee->media->where('collection_name','photo_profile_3')->each->delete();
                }else if($request->active == 4){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->addMediaFromUrl($employee->getFirstMedia('photo_profile_4')->getUrl())->toMediaCollection('photo_profile_active');
                    $employee->media->where('collection_name','photo_profile_4')->each->delete();
                }
            
               
        }else{
            if(isset($request->file_input_1)){
                if($request->active == 1){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->media->where('collection_name','photo_profile_1')->each->delete();
                    $employee->addMedia($request->file_input_1)->toMediaCollection('photo_profile_active');
                }else{
                    $employee->media->where('collection_name','photo_profile_1')->each->delete();
                    $employee->addMedia($request->file_input_1)->toMediaCollection('photo_profile_1');
                }
            }
            
            if(isset($request->file_input_2)){
                if($request->active == 2){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->media->where('collection_name','photo_profile_2')->each->delete();
                    $employee->addMedia($request->file_input_2)->toMediaCollection('photo_profile_active');
                }else{
                    $employee->media->where('collection_name','photo_profile_2')->each->delete();
                    $employee->addMedia($request->file_input_2)->toMediaCollection('photo_profile_2');
                }
            }
            
            if(isset($request->file_input_3)){
                if($request->active == 3){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->media->where('collection_name','photo_profile_3')->each->delete();
                    $employee->addMedia($request->file_input_3)->toMediaCollection('photo_profile_active');
                }else{
                    $employee->media->where('collection_name','photo_profile_3')->each->delete();
                    $employee->addMedia($request->file_input_3)->toMediaCollection('photo_profile_3');
                }
            }
            
            if(isset($request->file_input_4)){
                if($request->active == 4){
                    $employee->media->where('collection_name','photo_profile_active')->each->delete();
                    $employee->media->where('collection_name','photo_profile_4')->each->delete();
                    $employee->addMedia($request->file_input_4)->toMediaCollection('photo_profile_active');
                }else{
                    $employee->media->where('collection_name','photo_profile_4')->each->delete();
                    $employee->addMedia($request->file_input_4)->toMediaCollection('photo_profile_4');
                }
            }
        }

        return response()->json('Sukses');
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
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
