<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\Status;
use App\Models\Progress;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefectCardMechanicController extends Controller
{
    protected $statuses;
    protected $break;
    protected $waiting;
    protected $other;
    protected $accomplished;
    protected $notification;
    protected $propose_corrections;
    protected $propose_correction_text;

    public function __construct()
    {
        $this->statuses = Status::ofDefectCard()->get();
        $this->break = Type::ofJobCardPauseReason()->where('code','break-time')->first()->uuid;
        $this->waiting = Type::ofJobCardPauseReason()->where('code','waiting-material')->first()->uuid;
        $this->other = Type::ofJobCardPauseReason()->where('code','other')->first()->uuid;
        $this->accomplished = Type::ofJobCardCloseReason()->where('code','accomplished')->first()->uuid;
        $this->notification = $notification = array(
            'message' => "DefectCard's status has been updated",
            'title' => "Success",
            'alert-type' => "success"
        );
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
        $this->propose_corrections = array();
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $this->propose_corrections[$i] =  $defectCard->code;
        }

        $this->propose_correction_text = '';
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $this->propose_correction_text =  $defectCard->pivot->propose_correction_text;
        }

        if ($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "open") {
            return view('frontend.defect-card.mechanic.progress-open', [
                'defectcard' => $defectcard,
                'status' => $this->statuses->where('code','open')->first(),
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.defect-card.mechanic.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'defectcard' => $defectcard,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.defect-card.mechanic.progress-pause', [
                'defectcard' => $defectcard,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.defect-card.mechanic.progress-close', [
                'defectcard' => $defectcard,
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
            ]);
        }
        else{
            return view('frontend.defect-card.mechanic.progress-close', [
                'defectcard' => $defectcard,
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
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
            return redirect()->route('frontend.defectcard-mechanic.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'reason_id' =>  Type::ofJobCardPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.defectcard-mechanic.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                'reason_id' =>  Type::ofJobCardCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.defectcard-mechanic.index')->with($this->notification);
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
