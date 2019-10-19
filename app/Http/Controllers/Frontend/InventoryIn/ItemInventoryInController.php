<?php

namespace App\Http\Controllers\Frontend\InventoryIn;

use App\Models\InventoryIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\InventoryInStore;
use App\Http\Requests\Frontend\InventoryInUpdate;
use App\Models\Item;

class ItemInventoryInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InventoryIn::with('items')->get();

        return response()->json($items);
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
     * @param  \App\Http\Requests\Frontend\ItemInventoryInStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryInStore $request, InventoryIn $inventoryIn, Item $item)
    {
        $exists = $inventoryIn->items()->where('item_id', $item->id)->first();

        if ($exists) {
            return response()->json(['title' => "Danger"]);
        }

        $inventoryIn->items()->attach($item->id, [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'quantity_in_primary_unit' => $request->unit_id,
                'expired_at' => $request->exp_date,
                'serial_number' => $request->serial_no,
                'purchased_price' => 0, // ??
                'total' => 0, // ??
                'description' => $request->remark
            ]);

        return response()->json($inventoryIn);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryIn $inventoryIn)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryInUpdate  $request
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryInUpdate $request, InventoryIn $inventoryIn, Item $item)
    {
        $inventoryIn->items()->updateExistingPivot($item->id,
            [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'quantity_in_primary_unit' => $request->unit_id,
                'expired_at' => $request->exp_date,
                'serial_number' => $request->serial_no,
                'description' => $request->remark
            ]);

        return response()->json($inventoryIn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryIn $inventoryIn, Item $item)
    {
        $inventoryIn->items()->detach($item->id);

        return response()->json($inventoryIn);
    }
}
