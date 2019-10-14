<?php

namespace App\Http\Controllers\Frontend\InventoryIn;

use Auth;
use App\Models\Approval;
use App\Models\InventoryIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\InventoryInStore;
use App\Http\Requests\Frontend\InventoryInUpdate;

class InventoryInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.inventory-in.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.inventory-in.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryInStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryInStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryIn $inventoryIn)
    {
        return view('frontend.inventory-in.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryIn $inventoryIn)
    {
        return view('frontend.inventory-in.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryInUpdate  $request
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryInUpdate $request, InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryIn $inventoryIn)
    {
        $inventoryIn->delete();
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function approve(InventoryIn $inventoryIn)
    {
        $inventoryIn->approvals()->save(new Approval([
            'approvable_id' => $inventoryIn->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($inventoryIn);
    }
}
