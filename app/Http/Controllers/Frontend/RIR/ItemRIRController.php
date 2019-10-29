<?php

namespace App\Http\Controllers\Frontend\RIR;

use Carbon\Carbon;
use App\Models\RIR;
use App\Models\Item;
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
        $request->merge(['expired_at' => Carbon::parse($request->expired_at)]);
        $exists = $rir->items()->where('item_id',$item->id)->first();
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

                $price = $rir->purchase_order->items->where('pivot.item_id',$item->id)->first()->pivot->price;
                $rir->items()->attach([$item->id => [
                    'quantity'=> $request->quantity,
                    'already_received_amount'=> 2,// TODO ask whats is it?
                    'unit_id' => $request->unit_id,
                    'quantity_unit' => $quantity_unit,
                    'price' => $price,
                    'note' => $request->note,
                    'expired_at' => $request->expired_at
                    ]
                ]);
            }else{
                foreach($request->serial_numbers as $serial_number){
                    $item = Item::find($item->id);

                    $price = $rir->purchase_order->items->where('pivot.item_id',$item->id)->first()->pivot->price;
                    $rir->items()->attach([$item->id => [
                        'serial_number'=> $serial_number,
                        'quantity'=> 1,
                        'already_received_amount'=> 2,// TODO ask whats is it?
                        'unit_id' => $item->unit_id,
                        'quantity_unit' => 1,
                        'price' => $price,
                        'note' => $request->note,
                        'expired_at' => $request->expired_at
                        ]
                    ]);
                }
                return response()->json($rir);
            }
        }
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
        $request->merge(['expired_at' => Carbon::parse($request->expired_at)]);
        $rir->items()->updateExistingPivot($item->id,
                                ['unit_id'=>$request->unit_id,
                                'quantity'=> $request->quantity,
                                'quantity_unit'=> $quantity_unit,
                                'note' => $request->note,
                                'expired_at' => $request->expired_at
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
