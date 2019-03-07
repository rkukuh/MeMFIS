<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Repeat;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RepeatStore;
use App\Http\Requests\Frontend\RepeatUpdate;

class RepeatController extends Controller
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
     * @param  \App\Http\Requests\Frontend\RepeatStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepeatStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function show(Repeat $repeat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function edit(Repeat $repeat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RepeatUpdate  $request
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function update(RepeatUpdate $request, Repeat $repeat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repeat  $repeat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repeat $repeat)
    {
        //
    }
}
