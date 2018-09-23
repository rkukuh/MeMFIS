<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DepartmentStore;
use App\Http\Requests\Frontend\DepartmentUpdate;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::pluck('name', 'id');

        return json_encode($departments);
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
     * @param  \App\Http\Requests\Frontend\DepartmentStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStore $request)
    {
        $department = Department::create([
            // 'abbr' => $request->abbr,
            // 'name' => $request->name,
        ]);

        return response()->json($department);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\DepartmentUpdate  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdate $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
