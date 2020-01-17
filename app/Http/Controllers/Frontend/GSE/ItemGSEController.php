<?php

namespace App\Http\Controllers\Frontend\GSE;

use App\Models\GSE;
use App\Models\Item;
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
        // dd($request->all());
        $gse->items()->attach([$item->id => [
            'serial_number'=> $request->serial_no,
            'quantity'=> $request->quantity,
            'unit_id' => $request->unit_id,
            'note' => $request->note
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
                'serial_number'=> $request->serial_no,
                'quantity'=> $request->quantity,
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
