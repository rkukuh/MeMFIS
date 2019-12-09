<?php

namespace App\Http\Controllers\Frontend\GoodsReceived;

use Carbon\Carbon;
use App\Models\Unit;
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
        $request->merge(['expired_at' => Carbon::parse($request->expired_at)]);
        $request->merge(['unit_id' =>  Unit::where('uuid',$request->unit_id)->first()->id]);

        $exists = $goodsReceived->items()->where('item_id',$item->id)->first();
        if($exists){
            return response()->json(['title' => "Danger"]);
        }else{
            if($request->serial_numbers == null){
                $item = Item::find($item->id);
                if($request->unit_id <> $item->unit_id){
                    $quantity = $request->quantity;
                    $qty_uom = $item->units->where('uom.unit_id',$request->unit_id)->first()->uom->quantity;
                    $quantity_unit = $qty_uom*$quantity;
                }
                else{
                    $quantity_unit = $request->quantity;
                }
                $price = $goodsReceived->purchase_order->items->where('pivot.item_id',$item->id)->first()->pivot->price;
                $goodsReceived->items()->attach([$item->id => [
                    'quantity'=> $request->quantity,
                    'unit_id' => $request->unit_id,
                    'quantity_unit' => $quantity_unit,
                    'price' => ($request->quantity/$quantity_unit)*$price,
                    'note' => $request->note,
                    'expired_at' => $request->expired_at,
                    'location' => $request->location,
                    ]
                ]);
            }else{
                foreach($request->serial_numbers as $serial_number){
                    $item = Item::find($item->id);

                    $price = $goodsReceived->purchase_order->items->where('pivot.item_id',$item->id)->first()->pivot->price;
                    $goodsReceived->items()->attach([$item->id => [
                        'serial_number'=> $serial_number,
                        'quantity'=> 1,
                        'unit_id' => $item->unit_id,
                        'quantity_unit' => 1,
                        'price' => $price,
                        'note' => $request->note,
                        'expired_at' => $request->expired_at,
                        'location' => $request->location,
                        ]
                    ]);
                }
                return response()->json($goodsReceived);
            }
        }
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
        $item = Item::find($item->id);
        if($request->unit_id <> $item->unit_id){
            $quantity = $request->quantity;
            $qty_uom = $item->units->where('uom.unit_id',$request->unit_id)->first()->uom->quantity;
            $quantity_unit = $qty_uom*$quantity;
        }
        else{
            $quantity_unit = $request->quantity;
        }

        $request->merge(['expired_at' => Carbon::parse($request->exp_date)]);
        $goodsReceived->items()->updateExistingPivot($item->id,
        ['unit_id'=>$request->unit_id,
        'quantity'=> $request->quantity,
        'quantity_unit'=> $quantity_unit,
        'note' => $request->note,
        'expired_at' => $request->expired_at,
        'location' => $request->location,
        ]);

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
