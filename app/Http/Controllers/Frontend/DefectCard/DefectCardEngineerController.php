<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\Status;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefectCardEngineerController extends Controller
{
    protected $statuses;
    protected $break;
    protected $waiting;
    protected $other;
    protected $accomplished;
    protected $notification;

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
        return view('frontend.defect-card.engineer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.defect-card.engineer.open');
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
        return view('frontend.defect-card.engineer.progress');
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
            return view('frontend.defect-card.engineer.progress-open', [
                'defectcard' => $defectcard,
                'status' => $this->statuses->where('code','open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.defect-card.engineer.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'defectcard' => $defectcard,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.defect-card.engineer.progress-pause', [
                'defectcard' => $defectcard,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.defect-card.engineer.progress-close', [
                'defectcard' => $defectcard,
            ]);
        }
        else{
            return view('frontend.defect-card.engineer.progress-close', [
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
    public function update(Request $request,DefectCard $defectcard)
    {
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'open'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.defectcard-engineer.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'reason_id' =>  Type::ofJobCardPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.defectcard-engineer.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
            $defectcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                'reason_id' =>  Type::ofJobCardCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            $defectcard->approvals()->save(new Approval([
                'approvable_id' => $defectcard->id,
                'approved_by' => Auth::id(),
            ]));
            return redirect()->route('frontend.defectcard-engineer.index')->with($this->notification);
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
            redirect()->route('frontend.defectcard-engineer.index')->withErrors($validator)->withInput();
          }

        $search = DefectCard::where('code',$request->code)->first();

        return redirect()->route('frontend.defectcard-engineer.edit',$search->uuid);
    }
}
