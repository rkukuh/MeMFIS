<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Item;
use App\Models\Type;
use App\Models\HtCrr;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\HtCrrItemStore;
use App\Http\Requests\Frontend\HtCrrItemUpdate;

class HtCrrItemsController extends Controller
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
     * @param  \App\Http\Requests\Frontend\HtCrrStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HtCrr $htcrr, HtCrrItemStore $request)
    {
        $htcrr->items()->attach($htcrr->id, [
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity,
            'note' => $request->note
        ]);

        return response()->json($htcrr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function show(HtCrr $htCrr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function edit(HtCrr $htCrr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\HtCrrUpdate  $request
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function update(HtCrrItemUpdate $request, HtCrr $htCrr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function destroy(HtCrr $htcrr, Item $item)
    {
        $htcrr->items()->detach($item);

        return response()->json($htcrr);
    }
}
