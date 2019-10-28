<?php

namespace App\Http\Controllers\Frontend\GSE;

use App\Iten;
use App\GroundSupportEquiptment;
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
    public function store(Request $request, GroundSupportEquiptment $groundSupportEquiptment, Item $item)
    {
        $groundSupportEquiptment->items()->attach([$item->pivot->item_id => [
            'quantity'=> 0,
            'quantity_unit' => 0,
            'unit_id' => $item->pivot->unit_id
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function show(GroundSupportEquiptment $groundSupportEquiptment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function edit(GroundSupportEquiptment $groundSupportEquiptment, Item $item)
    {
        return response()->json($groundSupportEquiptment->items->where('pivot.item_id',$item->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroundSupportEquiptment $groundSupportEquiptment, Item $item)
    {
        $groundSupportEquiptment->items()->updateExistingPivot($item->id,
                ['unit_id'=>$request->unit_id,
                'quantity'=> $request->quantity,
                'quantity_unit'=> $quantity_unit,
                'note' => $request->note
                ]);

        return response()->json($groundSupportEquiptment);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroundSupportEquiptment $groundSupportEquiptment, Item $item)
    {
        $groundSupportEquiptment->items()->detach($item->id);

        return response()->json($groundSupportEquiptment);
    }
}
