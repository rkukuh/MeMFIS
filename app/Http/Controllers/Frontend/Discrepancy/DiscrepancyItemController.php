<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use App\Models\Unit;
use App\Models\Item;
use App\Models\Type;
use App\Models\DefectCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DiscrepancyItemStore;
use App\Http\Requests\Frontend\DiscrepancyItemUpdate;


class DiscrepancyItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DefectCard $discrepancy)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DefectCard $discrepancy)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscrepancyItemStore $request,DefectCard $discrepancy)
    {
        $request->merge(['item_id' => Item::where('uuid',$request->item_id)->first()->id]);
        $request->merge(['unit_id' => Unit::where('uuid',$request->unit_id)->first()->id]);

        $discrepancy->items()->attach($discrepancy->id, [
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity,
            'ipc_ref'=> $request->ipc_ref,
            'sn_on'=> $request->sn_on,
            'sn_off'=> $request->sn_off,
            'note'=> $request->note,
        ]);

        return response()->json($discrepancy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $discrepancy,Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $discrepancy,Item $item)
    {
        $item = $discrepancy->items()->where('item_id',$item->id)->first();

        return response()->json($item);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscrepancyItemUpdate $request, DefectCard $discrepancy,Item $item)
    {
        $discrepancy->items()->updateExistingPivot($item, [
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity,
            'ipc_ref'=> $request->ipc_ref,
            'sn_on'=> $request->sn_on,
            'sn_off'=> $request->sn_off,
            'note'=> $request->note,
        ]);

        return response()->json($discrepancy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefectCard $discrepancy,Item $item)
    {
        $discrepancy->items()->detach($item);

        return response()->json($discrepancy);
    }
}
