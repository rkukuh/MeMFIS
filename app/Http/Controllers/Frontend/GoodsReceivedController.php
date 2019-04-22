<?php

namespace App\Http\Controllers\Frontend;


use App\Models\GoodsReceived;
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
        // $goodsReceived = GoodsReceived::create($request->all());

        $goodsReceived = GoodsReceived::create([
            'received_at' => $request->received_at,
            'received_by' => $request->received_by,
            'vehicle_no' => $request->vehicle_no,
            'container_no' => $request->container_no,
            'purchase_order_id' => $request->purchase_order_id,
            'storage_id' => $request->storage_id,
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
        //
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
