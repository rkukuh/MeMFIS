<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\TaskCard;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardRoutineItemStore;
use App\Http\Requests\Frontend\TaskCardRoutineItemUpdate;

class TaskCardRoutineItemsController extends Controller
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
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCard $taskcard, TaskCardRoutineItemStore $request)
    {
        $request->merge(['item_id' => Item::where('uuid',$request->item_id)->first()->id]);
        $taskcard->items()->attach($request->item_id, [
            'unit_id' => $request->unit_id,
            'quantity' => $request->quantity,
            'note' => $request->note
        ]);

        // return response()->json($taskcard);
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
    public function edit(TaskCard $taskCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineItemUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardRoutineItemUpdate $request, TaskCard $taskCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskcard $taskcard, Item $item)
    {
        $taskcard->items()->detach($item);

        return response()->json($taskcard);
    }
}
