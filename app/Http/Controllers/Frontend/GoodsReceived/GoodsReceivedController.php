<?php

namespace App\Http\Controllers\Frontend\GoodsReceived;

use Carbon\Carbon;
use App\Models\Storage;
use App\Models\PurchaseOrder;
use App\Models\GoodsReceived;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\GoodsReceivedStore;
use App\Http\Requests\Frontend\GoodsReceivedUpdate;

class GoodsReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.goods-received-note.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.goods-received-note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GoodsReceivedStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsReceivedStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('GRN-', GoodsReceived::withTrashed()->count()+1)]);
        $request->merge(['purchase_order_id' => PurchaseOrder::where('uuid',$request->purchase_order_id)->first()->id]);
        $request->merge(['storage_id' => Storage::where('uuid',$request->storage_id)->first()->id]);
        $request->merge(['received_at' => Carbon::parse($request->received_at)]);

        $goodsReceived = GoodsReceived::create($request->all());

        $items = PurchaseOrder::find($request->purchase_order_id)->items;

        foreach($items as $item){
            $goodsReceived->items()->attach([$item->pivot->item_id => [
                'quantity'=> $item->pivot->quantity,
                'already_received'=> 2,// TODO ask whats is it?
                'unit_id' => $item->pivot->unit_id
                ]
            ]);
        }

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
        return view('frontend.goods-received-note.show', [
            'goodsReceived' => $goodsReceived,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsReceived $goodsReceived)
    {
        return view('frontend.goods-received-note.edit', [
            'goodsReceived' => $goodsReceived,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GoodsReceivedUpdate  $request
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsReceivedUpdate $request, GoodsReceived $goodsReceived)
    {
        $request->merge(['storage_id' => Storage::where('uuid',$request->storage_id)->first()->id]);
        $request->merge(['received_at' => Carbon::parse($request->received_at)]);

        $goodsReceived->update($request->all());

        return response()->json($goodsReceived);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsReceived $goodsReceived)
    {
        $goodsReceived->delete();

        return response()->json($goodsReceived);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function approve(GoodsReceived $goodsReceived)
    {
        return response()->json($goodsReceived);
    }
}
