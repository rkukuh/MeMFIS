<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StorageStore;
use App\Http\Requests\Frontend\StorageUpdate;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.storage.index');
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
     * @param  \App\Http\Requests\Frontend\StorageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorageStore $request)
    {
        $storage = Storage::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->active,
        ]);

        return response()->json($storage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function show(Storage $storage)
    {
        return response()->json($storage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function edit(Storage $storage)
    {
        return response()->json($storage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\StorageUpdate  $request
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function update(StorageUpdate $request, Storage $storage)
    {
        $storage = Storage::find($storage);
        // $storage->name = $request->name;
        // $storage->save();

        return response()->json($storage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storage $storage)
    {
        $storage->delete();

        return response()->json($storage);
    }
}
