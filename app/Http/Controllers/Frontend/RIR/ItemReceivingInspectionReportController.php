<?php

namespace App\Http\Controllers\Frontend\RIR;

use App\Item;
use App\RIR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemRIRController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,RIR $rir, Item $item)
    {
        $rir->items()->attach([$item->pivot->item_id => [
            'quantity'=> 0,
            'quantity_unit' => 0,
            'unit_id' => $item->pivot->unit_id
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function show(RIR $rir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function edit(RIR $rir, Item $item)
    {
        return response()->json($rir->items->where('pivot.item_id',$item->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RIR $rir, Item $item)
    {
        $rir->items()->updateExistingPivot($item->id,
                                ['unit_id'=>$request->unit_id,
                                'quantity'=> $request->quantity,
                                'quantity_unit'=> $quantity_unit,
                                'note' => $request->note
                                ]);

        return response()->json($rir);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function destroy(RIR $rir, Item $item)
    {
        $rir->items()->detach($item->id);

        return response()->json($rir);
    }
}
