<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Employee;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Frontend\EmployeeUserStore;
use App\Http\Requests\Frontend\EmployeeUserUpdate;
use App\Http\Requests\Frontend\EmployeeUserPassUpdate;
use App\Http\Controllers\Controller;

class EmployeeUserController extends Controller
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
     * @param  \app\http\Requests\frontend\EmployeeUserStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeUserStore $request,Employee $employee)
    {
        if($employee->last_name == $employee->first_name){
            $name = $employee->first_name;
        }else{
            $name = $employee->first_name.' '.$employee->last_name;
        }
        $user = User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->active
        ]);

        $user->assignRole(
            Role::where('name', $request->role)->first()->name
        );

        $employee->update([
            'user_id' => $user->id
        ]);

        return response()->json('Sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \app\http\Requests\frontend\EmployeeUserUpdate  $request
     * @param  int  App\Models\Employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUserUpdate $request, Employee $employee, User $account)
    {
        if($employee->last_name == $employee->first_name){
            $name = $employee->first_name;
        }else{
            $name = $employee->first_name.' '.$employee->last_name;
        }
        
        $account->update([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->active
        ]);

        $account->assignRole(
            Role::where('name', $request->role)->first()->name
        );

        return response()->json('Sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_pass(EmployeeUserPassUpdate $request,User $account){

        $account->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json('Sukses');
    }
}
