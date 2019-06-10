<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use Auth;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Progress;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscrepancyEngineerController extends Controller
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
    public function create(JobCard $jobcard)
    {
        return view('frontend.discrepancy.engineer.create', [
            'jobcard' => $jobcard,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);
        $defectcard = DefectCard::create($request->all());

        $defectcard->progresses()->save(new Progress([
            'status_id' =>  Status::ofDefectcard()->where('code','open')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        return response()->json($defectcard);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $discrepancy)
    {
        return view('frontend.discrepancy.engineer.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $discrepancy)
    {
        return view('frontend.discrepancy.engineer.edit', [
            'discrepancy' => $discrepancy,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DefectCard $discrepancy)
    {
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDefectCard(DefectCard $discrepancy)
    {
        //
    }
}
