<?php

namespace App\Http\Controllers\Frontend\GroundSupportEquiptment;

use App\GroundSupportEquiptment;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Http\Requests\Frontend\GroundSupportEquiptmentStore;
use App\Http\Requests\Frontend\GroundSupportEquiptmentUpdate;
use App\Http\Controllers\Controller;

class GroundSupportEquiptmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.receiving-inspection-report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.receiving-inspection-report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroundSupportEquiptmentStore $request)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('GSE-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $GroundSupportEquiptmentStore = ReceivingInspectionReport::create($request->all());

        return response()->json($GroundSupportEquiptmentStore);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function show(GroundSupportEquiptment $groundSupportEquiptment)
    {
        return view('frontend.receiving-inspection-report.show', [
            'groundSupportEquiptment' => $groundSupportEquiptment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function edit(GroundSupportEquiptment $groundSupportEquiptment)
    {
        return view('frontend.receiving-inspection-report.edit', [
            'groundSupportEquiptment' => $groundSupportEquiptment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function update(GroundSupportEquiptmentUpdate $request, GroundSupportEquiptment $groundSupportEquiptment)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('GSE-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $groundSupportEquiptment->update($request->all());

        return response()->json($groundSupportEquiptment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroundSupportEquiptment  $groundSupportEquiptment
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroundSupportEquiptment $groundSupportEquiptment)
    {
        $groundSupportEquiptment->delete();

        return response()->json($groundSupportEquiptment);
    }
}
