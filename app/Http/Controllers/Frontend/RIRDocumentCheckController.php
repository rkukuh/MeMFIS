<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RIRDocumentCheck;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RIRDocumentCheckStore;
use App\Http\Requests\Frontend\RIRDocumentCheckUpdate;

class RIRDocumentCheckController extends Controller
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
     * @param  \App\Http\Requests\Frontend\RIRDocumentCheckStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RIRDocumentCheckStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return \Illuminate\Http\Response
     */
    public function show(RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RIRDocumentCheckUpdate  $request
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return \Illuminate\Http\Response
     */
    public function update(RIRDocumentCheckUpdate $request, RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }
}
