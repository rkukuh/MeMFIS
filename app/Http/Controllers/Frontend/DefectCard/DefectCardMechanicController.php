<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use App\Models\Status;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DefectCardMechanicController extends Controller
{
    protected $statuses;

    public function __construct()
    {
        $this->statuses = Status::ofDefectCard()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.defect-card.mechanic.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.defect-card.mechanic.open');
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
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $defectCard)
    {
        return view('frontend.defect-card.mechanic.progress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $defectcard)
    {
        if ($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "open") {
            return view('frontend.defect-card.mechanic.progress-open', [
                'defectcard' => $defectcard,
                'status' => $this->statuses->where('code','open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.defect-card.mechanic.progress-resume', [
                'defectcard' => $defectcard,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.defect-card.mechanic.progress-pause', [
                'defectcard' => $defectcard,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefectCard $defectCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefectCard $defectCard)
    {
        //
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:defectcards,code'
          ]);

          if ($validator->fails()) {
            return
            redirect()->route('frontend.defectcard-mechanic.index')->withErrors($validator)->withInput();
          }

        $search = DefectCard::where('code',$request->code)->first();

        return redirect()->route('frontend.defectcard-mechanic.edit',$search->uuid);
    }
}
