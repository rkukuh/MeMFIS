<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardEOStore;
use App\Http\Requests\Frontend\TaskCardEOUpdate;

class TaskCardEOController extends Controller
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
        return view('frontend.taskcard.nonroutine.eo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardEOStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardEOStore $request)
    {
        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);
            $taskcard->related_to()->attach($request->relationship);

            return response()->json($taskcard);
        }

        // TODO: Return error message as JSON
        return false;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskCard)
    {
        return view('frontend.taskcard.nonroutine.eo.show',[
            'taskcard' => $taskCard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit(Taskcard $taskCard)
    {
        return view('frontend.taskcard.nonroutine.eo.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardEOUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardEOUpdate $request, Taskcard $taskCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskcard $taskCard)
    {
        //
    }
}
