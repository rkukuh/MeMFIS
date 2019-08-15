<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BPJS;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BPJSStore;
use App\Http\Requests\Frontend\BPJSUpdate;

class BPJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/benefit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/benefit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BPJSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BPJSStore $request)
    {
        $bpjs = BPJS::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($bpjs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function show(BPJS $bPJS)
    {
        // print_r($bp);
        // return response()->json($bPJS);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function edit(BPJS $bPJS)
    {
        return redirect('/benefit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BPJSUpdate  $request
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function update(BPJSUpdate $request, BPJS $bPJS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function destroy(BPJS $bPJS)
    {
        //
    }
}
