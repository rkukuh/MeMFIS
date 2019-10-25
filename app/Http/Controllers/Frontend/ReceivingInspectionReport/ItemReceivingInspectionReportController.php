<?php

namespace App\Http\Controllers\Frontend\ReceivingInspectionReport;

use App\Item;
use App\ReceivingInspectionReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemReceivingInspectionReportController extends Controller
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
    public function store(Request $request,ReceivingInspectionReport $receivingInspectionReport, Item $item)
    {
        $receivingInspectionReport->items()->attach([$item->pivot->item_id => [
            'quantity'=> 0,
            'quantity_unit' => 0,
            'unit_id' => $item->pivot->unit_id
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivingInspectionReport $receivingInspectionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceivingInspectionReport $receivingInspectionReport, Item $item)
    {
        return response()->json($receivingInspectionReport->items->where('pivot.item_id',$item->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivingInspectionReport $receivingInspectionReport, Item $item)
    {
        $receivingInspectionReport->items()->updateExistingPivot($item->id,
                                ['unit_id'=>$request->unit_id,
                                'quantity'=> $request->quantity,
                                'quantity_unit'=> $quantity_unit,
                                'note' => $request->note
                                ]);

        return response()->json($receivingInspectionReport);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceivingInspectionReport $receivingInspectionReport, Item $item)
    {
        $receivingInspectionReport->items()->detach($item->id);

        return response()->json($receivingInspectionReport);
    }
}
