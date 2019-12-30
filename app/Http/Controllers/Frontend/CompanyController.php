<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Company;
use App\Models\Type;
use App\Models\Department;
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
        // dd($request->all());
        $parent = Company::where('uuid', $request->company)->first();
        $type = Type::where('uuid', $request->company_type)->first();

        if (strtolower($type->name) == 'department') {
            
            $company = Company::where('code', 'mmf')->first();

            if (!empty($company)) {
                $result = Department::create([
                    'code' => $request->code,
                    'company_id' => $company->id,
                    'parent_id' => $parent->id,
                    'type_id' => $type->id,
                    'name' => $request->name,
                    'maximum_period' => $request->maximum_period,
                    'maximum_holiday' => $request->maximum_holiday,
                    'description' => $request->description
                ]);

                return response()->json($result);
            }else{
                // TODO: Return error message as JSON
                return response()->json(['error' => 'Company ID MMF tidak ditemukan']);
            }

        } else {

            $result = Company::create([
                'code' => $request->code,
                'name' => $request->name,
                'maximum_period' => $request->maximum_period,
                'maximum_holiday' => $request->maximum_holiday,
                'description' => $request->description,
                'parent_id' => $parent->id,
                'type_id' => $type->id
            ]);

            // TODO: Return error message as JSON
            return response()->json($result);

        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('frontend.company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company)
    {
        $comdept = Company::where('uuid', $company)->first();

        if(empty($comdept)){
            $comdept = Department::where('uuid', $company)->first();
        }

        $companies = Company::pluck('name','uuid')->toArray();
        $departments = Department::pluck('name','uuid')->toArray();

        $companies = array_merge($companies, $departments);

        return view('frontend.company.edit', [
            'types' => Type::ofCompany()->pluck('name','uuid'),
            'companies' => $companies,
            'company' => $comdept,
            ]);
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
        $parent_id = null;

        $type_id = null;

        $parent = Company::select('id')->where('uuid', $request->parent_structure)->first();

        $type = Type::select('id')->where('uuid', $request->company)->first();

        if (!empty($parent->id)) {
            $parent_id = $parent->id;
        }

        if (!empty($type->id)) {
            $type_id = $type->id;
        }

        Company::where('uuid', $request->uuid)
            ->update([
                'code' => $request->code,
                'name' => $request->name,
                'maximum_period' => $request->maximum_period,
                'maximum_holiday' => $request->maximum_holiday,
                'description' => $request->description,
                'parent_id' => $parent_id,
                'type_id' => $type_id
            ]);

        // TODO: Return error message as JSON
        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        // TODO: Return error message as JSON
        return response()->json($company);
    }
}
