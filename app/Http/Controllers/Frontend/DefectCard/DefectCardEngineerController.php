<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use Auth;
use Validator;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\Status;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Employee;
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
    public function show(DefectCard $defectcard)
    {
        $this->propose_corrections = array();
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $this->propose_corrections[$i] =  $defectCard->code;
        }

        $this->propose_correction_text = '';
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $this->propose_correction_text =  $defectCard->pivot->propose_correction_text;
        }

        return view('frontend.defect-card.engineer.progress-close', [
            'defectcard' => $defectcard,
            'propose_corrections' => $this->propose_corrections,
            'propose_correction_text' => $this->propose_correction_text,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $defectcard)
    {
        $zones = $defectcard->zones->pluck('name')->toArray();
        $zones = join(',', $zones);
        $created_by = $defectcard->audits->first()->user->name;
        $employees = Employee::get();
        $status = Status::find($defectcard->progresses->last()->status_id);
        $this->propose_corrections = array();
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $this->propose_corrections[$i] =  $defectCard->code;
        }

        $this->propose_correction_text = '';
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $this->propose_correction_text =  $defectCard->pivot->propose_correction_text;
        }

        if ($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "open") {
            return view('frontend.defect-card.engineer.progress-open', [
                'defectcard' => $defectcard,
                'status' => $this->statuses->where('code','open')->first(),
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
                'zones' => $zones,
                'status' => $status,
                'employees' => $employees,
                'created_by' => $created_by
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
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
                'zones' => $zones,
                'status' => $status,
                'employees' => $employees,
                'created_by' => $created_by
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.defect-card.engineer.progress-pause', [
                'defectcard' => $defectcard,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
                'zones' => $zones,
                'accomplished' => $this->accomplished,
                'status' => $status,
                'employees' => $employees,
                'created_by' => $created_by
            ]);
        }
        else if($this->statuses->where('id',$defectcard->progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.defect-card.engineer.progress-close', [
                'defectcard' => $defectcard,
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
                'zones' => $zones,
                'status' => $status,
                'accomplished' => $this->accomplished,
                'employees' => $employees,
                'created_by' => $created_by
            ]);
        }
        else{
            return view('frontend.defect-card.engineer.progress-close', [
                'defectcard' => $defectcard,
                'propose_corrections' => $this->propose_corrections,
                'propose_correction_text' => $this->propose_correction_text,
                'accomplished' => $this->accomplished,
                'zones' => $zones,
                'status' => $status,
                'employees' => $employees,
                'created_by' => $created_by
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
        // get all the helper
        $helpers_code = $defectcard->helpers->pluck('code')->toArray();
        $helpers = $defectcard->helpers;

        // compare if there's any difference
        $old_helper = array_diff($helpers_code, $request->helper);
        $new_helper = array_diff($request->helper, $helpers_code);
        $new_helpers = Employee::whereIn('code',$new_helper)->get();
        $old_helpers = Employee::whereIn('code',$old_helper)->get();
        if(sizeof($old_helper) > 0){
            // delete the olds one
            foreach($old_helpers as $key => $helper){
                $defectcard->helpers()->updateExistingPivot($helper, ['deleted_at' => Carbon::now()], false);
            }
    
            // insert the new selected helper with additionals
            foreach($new_helpers as $key => $helper){
                $reference_key = array_search($helper->code, $request->helper);
                $defectcard->helpers()->attach($helper,['additionals' => $request->reference[$reference_key]]);
            }
        }
        
        // update additionals ( reference )
        foreach($helpers as $key => $helper){
            $defectcard->helpers()->updateExistingPivot($helper, array('additionals' => $request->reference[$key]), false);
        }


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
                'conducted_by' => Auth::id(),
                'is_approved' => 1
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
     * @param  \App\Models\DefectCard  $DefectCard
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

    /**
     * Add helper for related defect card in storage .
     *
     * @param  \App\Models\DefectCard  $DefectCard
     * @return \Illuminate\Http\Response
     */
    public function add_helper(DefectCard $DefectCard, Request $request)
    {
        $employee = Employee::where('code', $request->helper)->first();
        $DefectCard->helpers()->attach($employee->id, ['additionals' => $request->reference]);
        $DefectCard->current_helpers = $DefectCard->helpers()->count();

        return response()->json($DefectCard);
    }

    /**
     * Remove helper for related defect card in storage .
     *
     * @param  \App\Models\DefectCard  $DefectCard
     * @return \Illuminate\Http\Response
     */
    public function remove_helper(DefectCard $DefectCard,Employee $helper)
    {
        $DefectCard->helpers()->detach($helper->id);
        $DefectCard->current_helpers = $DefectCard->helpers()->count();
        
        return response()->json($DefectCard);
    }
}
