<?php

namespace App\Http\Controllers\Frontend\InventoryOut;

use Auth;
use App\Models\Storage;
use App\Models\Approval;
use App\Models\InventoryOut;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\InventoryOutStore;
use App\Http\Requests\Frontend\InventoryOutUpdate;
use App\Helpers\DocumentNumber;
use App\Models\Employee;

class MaterialInventoryOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.inventory-out.material.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.inventory-out.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryOutStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryOutStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('IOUT-', InventoryOut::withTrashed()->count() + 1)]);
        $request->merge(['inventoryoutable_type' => 'App\Models\InventoryOut']);
        $request->merge(['inventoryoutable_id' => InventoryOut::withTrashed()->count() + 1]);

        $inventoryOut = InventoryOut::create($request->all());

        return response()->json($inventoryOut);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryOut $inventoryOut)
    {
        return view('frontend.inventory-out.material.show', [
                'inventoryOut' => $inventoryOut
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryOut $inventoryOut)
    {
        $storages = Storage::get();
        $employees = Employee::get();

        return view('frontend.inventory-out.material.edit', [
            'storages' => $storages,
            'employees' => $employees,
            'inventoryOut' => $inventoryOut,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryOutUpdate  $request
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryOutUpdate $request, InventoryOut $inventoryOut)
    {
        $inventoryOut->update($request->all());

        return response()->json($inventoryOut);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryOut $inventoryOut)
    {
        $inventoryOut->delete();
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function approve(InventoryOut $inventoryOut)
    {
        $inventoryOut->approvals()->save(new Approval([
            'approvable_id' => $inventoryOut->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($inventoryOut);
    }
}
