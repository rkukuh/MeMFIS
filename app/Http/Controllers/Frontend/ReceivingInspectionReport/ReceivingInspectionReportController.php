<?php

namespace App\Http\Controllers\Frontend\ReceivingInspectionReport;

use App\ReceivingInspectionReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceivingInspectionReportController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivingInspectionReport $receivingInspectionReport)
    {
        return view('frontend.receiving-inspection-report.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceivingInspectionReport $receivingInspectionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivingInspectionReport $receivingInspectionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceivingInspectionReport $receivingInspectionReport)
    {
        //
    }
}
