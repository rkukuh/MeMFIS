<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use Auth;
use Validator;
use App\Models\Status;
use App\Models\Progress;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.defect-card.mechanic.progress-close', [
                'defectcard' => $defectcard,
            ]);
        }
        else{
            return view('frontend.defect-card.mechanic.progress-close', [
                'defectcard' => $defectcard,
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
    public function update(Request $request, DefectCard $defectcard)
    {
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'open'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.defectcard-mechanic.index');
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.defectcard-mechanic.index');
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.defectcard-mechanic.index');
        }
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
