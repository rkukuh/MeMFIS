<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Fax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FaxStore;

class FaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Faxs = Fax::pluck('name', 'id');
        return json_encode($Faxs);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaxStore $request)
    {
        $Fax = Fax::create([
            // 'abbr' => $request->abbr,
            // 'name' => $request->name,
        ]);
        return response()->json($Fax);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function show(Fax $fax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function edit(Fax $fax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fax $fax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fax $fax)
    {
        //
    }
}
