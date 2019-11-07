<?php

namespace App\Http\Controllers\Frontend\Mutation;

use Auth;
use App\Models\Employee;
use App\Models\Storage;
use App\Models\Approval;
use App\Models\Mutation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MutationStore;
use App\Http\Requests\Frontend\MutationUpdate;
use App\Helpers\DocumentNumber;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.material-transfer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.material-transfer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\MutationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MutationStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('MTRF-', Mutation::withTrashed()->count() + 1)]);
        $mutation = Mutation::create($request->all());

        return response()->json($mutation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function show(Mutation $mutation)
    {
        return view('frontend.material-transfer.show', [
            'mutation' => $mutation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function edit(Mutation $mutation)
    {
        $storages = Storage::get();
        $employees = Employee::get();

        return view('frontend.material-transfer.edit', [
            'storages' => $storages,
            'employees' => $employees,
            'mutation' => $mutation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\MutationUpdate  $request
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function update(MutationUpdate $request, Mutation $mutation)
    {
        $mutation->update($request->all());

        return response()->json($mutation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mutation $mutation)
    {
        $mutation->delete();
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function approve(Mutation $mutation)
    {
        $mutation->approvals()->save(new Approval([
            'approvable_id' => $mutation->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($mutation);
    }
}
