<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Item;
use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardSIItemStore;
use App\Http\Requests\Frontend\TaskCardSIItemUpdate;

class TaskCardSIItemController extends Controller
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
     * @param  \App\Http\Requests\Frontend\TaskCardSIStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCard $taskcard, TaskCardSIItemStore $request)
    {
        $taskcard->items()->attach($taskcard->id, [
            'item_id' => $request->item_id,
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity,
            'note' => $request->note
        ]);

        return response()->json($taskcard);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit($taskCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardSIItemUpdate $request,$taskCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCard $taskcard, Item $item)
    {
        $taskcard->items()->detach($item);

        return response()->json($taskcard);
    }
}
