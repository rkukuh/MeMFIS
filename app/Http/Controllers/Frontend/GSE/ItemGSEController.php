<?php

namespace App\Http\Controllers\Frontend\GSE;

use App\Iten;
use App\GSE;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemGSEController extends Controller
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
    public function store(Request $request, GSE $gse, Item $item)
    {
        $gse->items()->attach([$item->pivot->item_id => [
            'quantity'=> 0,
            'quantity_unit' => 0,
            'unit_id' => $item->pivot->unit_id
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function show(GSE $gse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function edit(GSE $gse, Item $item)
    {
        return response()->json($gse->items->where('pivot.item_id',$item->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GSE $gse, Item $item)
    {
        $gse->items()->updateExistingPivot($item->id,
                ['unit_id'=>$request->unit_id,
                'quantity'=> $request->quantity,
                'quantity_unit'=> $quantity_unit,
                'note' => $request->note
                ]);

        return response()->json($gse);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function destroy(GSE $gse, Item $item)
    {
        $gse->items()->detach($item->id);

        return response()->json($gse);
    }
}
