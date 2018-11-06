<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Pivots\ItemStorage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemStorageStore;
use App\Http\Requests\Frontend\ItemStorageUpdate;

class ItemStorageController extends Controller
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
     * @param  \App\Http\Requests\Frontend\ItemStorageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStorageStore $request)
    {
        $item = Item::where('uuid',$request->uuid)->first();

        $item->storages()->attach([$request->storage => ['min' => $request->min, 'max' => $request->max]]);

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function show(ItemStorage $itemStorage)
    {
        return response()->json($itemStorage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemStorage $itemStorage)
    {
        return response()->json($itemStorage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemStorageUpdate  $request
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function update(ItemStorageUpdate $request, ItemStorage $itemStorage)
    {
        $itemStorage = ItemStorage::find($itemStorage);
        // $Item->name = $request->name;
        $itemStorage->save();

        return response()->json($itemStorage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function destroy($itemStorage , $storage)
    {
        $item = Item::find($itemStorage);
        $item->storages()->detach($storage);
        return response()->json($item);
    }
}
