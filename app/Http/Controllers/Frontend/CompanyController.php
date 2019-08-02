<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyStore;
use App\Http\Requests\Frontend\CompanyUpdate;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\CompanyStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStore $request)
    {
        $parent_id = Company::select('id')
        ->where('name',$request->company);

        $type_id = Type::select('id')->where('name',$request->parent_structure)
        ->where('of','company')->first();

        $company = Employee::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $parent_id,
            'type_id' => $type_id
        ]);

        return response()->json($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('frontend.company.show',['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('frontend.company.edit',['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\CompanyUpdate  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdate $request, Company $company)
    {

        $parent_id = Company::select('id')
        ->where('name',$request->company);

        $type_id = Type::select('id')->where('name',$request->parent_structure)
        ->where('of','company')->first();

        Employee::where('uuid',$request->uuid)
        ->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $parent_id,
            'type_id' => $type_id
        ]);

        // TODO: Return error message as JSON
        return response()->json($company);
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
