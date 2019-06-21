<?php

namespace App\Http\Controllers\Frontend\JobCardHardTime;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardHardTimeMechanicController extends Controller
{
    protected $statuses;
    protected $break;
    protected $waiting;
    protected $other;
    protected $accomplished;
    protected $notification;


    public function __construct()
    {
        $this->statuses = Status::ofJobCard()->get();
        $this->break = Type::ofJobCardPauseReason()->where('code','break-time')->first()->uuid;
        $this->waiting = Type::ofJobCardPauseReason()->where('code','waiting-material')->first()->uuid;
        $this->other = Type::ofJobCardPauseReason()->where('code','other')->first()->uuid;
        $this->accomplished = Type::ofJobCardCloseReason()->where('code','accomplished')->first()->uuid;
        $this->notification = $notification = array(
            'message' => "JobCard's status has been updated",
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
        return view('frontend.job-card-hard-time.mechanic.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.job-card.mechanic.open');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCardStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function show(JobCard $jobcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCard $jobcard)
    {
        if ($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "open") {
            return view('frontend.job-card-hard-time.mechanic.progress-open', [
                'jobcard' => $jobcard,
                'status' => $this->statuses->where('code','open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.job-card-hard-time.mechanic.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'jobcard' => $jobcard,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.job-card-hard-time.mechanic.progress-pause', [
                'jobcard' => $jobcard,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.job-card-hard-time.mechanic.progress-close', [
                'jobcard' => $jobcard,
            ]);
        }
        else{
            return view('frontend.job-card.mechanic.progress-close', [
                'jobcard' => $jobcard,
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardUpdate  $request
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, JobCard $jobcard)
    {
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'open'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard-mechanic.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'reason_id' =>  Type::ofJobCardPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard-mechanic.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                'reason_id' =>  Type::ofJobCardCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            if($request->discrepancy == 1){
                return redirect()->route('frontend.discrepancy.jobcard.mechanic.discrepancy',$jobcard->uuid);
            }
            else{
                return redirect()->route('frontend.jobcard-mechanic.index')->with($this->notification);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCard $jobcard)
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
            'number' => 'required|exists:jobcards,number'
          ]);

          if ($validator->fails()) {
            return
            redirect()->route('frontend.jobcard-mechanic.index')->withErrors($validator)->withInput();
          }

        $search = JobCard::where('number',$request->number)->first();

        return redirect()->route('frontend.jobcard-mechanic.edit',$search->uuid);
    }

}
