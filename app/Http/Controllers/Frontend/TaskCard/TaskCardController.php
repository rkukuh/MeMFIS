<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardStore;
use App\Http\Requests\Frontend\TaskCardUpdate;

class TaskCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.task-card.index');
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
     * @param  \App\Http\Requests\Frontend\TaskCardStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardStore $request)
    {
        $taskcard = TaskCard::create($request->all());

        return response()->json($taskcard);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskcard)
    {
        if(($taskcard->type->code == "basic") || ($taskcard->type->code == "sip") || ($taskcard->type->code == "cpcp")){
            return redirect()->route('frontend.taskcard-routine.show',$taskcard->uuid);
        }
        else if (($taskcard->type->code == "ad") || ($taskcard->type->code == "sb") || ($taskcard->type->code == "eo") || ($taskcard->type->code == "ea") || ($taskcard->type->code == "htcrr") || ($taskcard->type->code == "cmr") || ($taskcard->type->code == "awl")){
            return redirect()->route('frontend.taskcard-eo.show',$taskcard->uuid);
        }
        else if($taskcard->type->code == "si"){
            return redirect()->route('frontend.taskcard-si.show',$taskcard->uuid);
        }
        else if($taskcard->type->code == "preliminary"){
            return redirect()->route('frontend.preliminary.show',$taskcard->uuid);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit(Taskcard $taskCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardUpdate $request, Taskcard $taskCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCard $taskcard)
    {
        $taskcard->delete();

        return response()->json($taskcard);

    }
}
