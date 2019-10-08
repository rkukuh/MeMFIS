<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Pivots\ItemUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemUnitStore;
use App\Http\Requests\Frontend\ItemUnitUpdate;

class ItemUnitController extends Controller
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
     * @param  \App\Models\Item  $item
     * @param  \App\Http\Requests\Frontend\ItemUnitStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Item $item, ItemUnitStore $request)
    {
        $unit = Unit::find($request->unit_id);
        $ItemUnit = ItemUnit::where('item_id', $item->id)->get();
        $exists = $ItemUnit->where('deleted_at',null)->where('unit_id',$unit->id)->first();
        if($exists){
            return response()->json(['title' => "Danger"]);
        }else{
            $item->units()->attach($request->unit_id, [
                'quantity' => $request->uom_quantity
            ]);

            return response()->json($item);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ItemUnit $itemUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemUnit $itemUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemUnitUpdate  $request
     * @param  \App\Models\ItemUnit  $itemUnit
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUnitUpdate $request, ItemUnit $itemUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item, Unit $unit)
    {
        $item->units()->detach($unit);

        return response()->json($item);
    }
}
