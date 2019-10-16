<?php

namespace App\Http\Controllers\Frontend\GoodsReceived;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Storage;
use App\Models\PurchaseOrder;
use App\Models\GoodsReceived;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\GoodsReceivedItemStore;
use App\Http\Requests\Frontend\GoodsReceivedItemUpdate;

class ItemGoodsReceivedController extends Controller
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
     * @param  \App\Http\Requests\Frontend\GoodsReceivedStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsReceivedItemStore $request,GoodsReceived $goodsReceived, Item $item)
    {
        $price = $goodsReceived->purchase_order->items->where('pivot.item_id',$item->id)->first()->pivot->price;
        $goodsReceived->items()->attach([$item->id => [
            'quantity'=> $request->quantity,
            'already_received_amount'=> 2,// TODO ask whats is it?
            'unit_id' => $request->unit_id,
            'quantity_unit' => $request->quantity,
            'price' => $price,
            'note' => $request->note,
            ]
        ]);

        return response()->json($goodsReceived);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsReceived $goodsReceived)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsReceived $goodsReceived)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GoodsReceivedUpdate  $request
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsReceivedItemUpdate $request, GoodsReceived $goodsReceived, Item $item)
    {
        // dd($request->all());
        $goodsReceived->items()->updateExistingPivot($item->id,
        ['unit_id'=>$request->unit_id,
        'quantity'=> $request->quantity,
        // 'exp_date'=> $request->exp_date,
        'note' => $request->note]);

        return response()->json($goodsReceived);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsReceived $goodsReceived, Item $item)
    {
        $goodsReceived->items()->detach($item->id);

        return response()->json($goodsReceived);
    }
}
