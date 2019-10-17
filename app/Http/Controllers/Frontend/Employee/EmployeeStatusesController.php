<?php

namespace App\Http\Controllers\frontend\employee;

use App\Models\status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmployeeStatusesStore;
use App\Http\Requests\Frontend\EmployeeStatusesUpdate;

class EmployeeStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.employee.employee-status.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   \App\Http\Requests\Frontend\EmployeeStatusesStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStatusesStore $request)
    {
        $status = Status::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'of' => 'employment'
        ]);
     
        // TODO: Return error message as JSON
        return response()->json($status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        // TODO: Return error message as JSON
        return response()->json($status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        // TODO: Return error message as JSON
        return response()->json($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\EmployeeStatusesUpdate  $request
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeStatusesUpdate $request, status $status)
    {
        $status->update($request->all());

        // TODO: Return error message as JSON
        return response()->json($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        $status->delete();

        // TODO: Return error message as JSON
        return response()->json($status);
    }
}
