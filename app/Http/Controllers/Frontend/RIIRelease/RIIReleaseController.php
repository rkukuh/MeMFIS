<?php

namespace App\Http\Controllers\Frontend\RIIRelease;

use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardStore;
use App\Http\Requests\Frontend\TaskCardUpdate;

class RIIReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rii-release.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.rii-release.create');
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
        //
    }
}
