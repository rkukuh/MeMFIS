<?php

namespace App\Http\Controllers\Frontend\JobCardHardTime;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\Status;
use App\Models\HtCrr;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardHardTimeEngineerController extends Controller
{
    protected $statuses;
    protected $break;
    protected $waiting;
    protected $other;
    protected $accomplished;
    protected $notification;

    public function __construct()
    {
        $this->statuses = Status::ofHtCrr()->get();
        $this->break = Type::ofHtCrrPauseReason()->where('code','break-time')->first()->uuid;
        $this->waiting = Type::ofHtCrrPauseReason()->where('code','waiting-material')->first()->uuid;
        $this->other = Type::ofHtCrrPauseReason()->where('code','other')->first()->uuid;
        $this->accomplished = Type::ofHtCrrCloseReason()->where('code','accomplished')->first()->uuid;
        $this->notification = $notification = array(
                            'message' => "HtCrr's status has been updated",
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
        return view('frontend.job-card-hard-time.engineer.index');
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
    public function show(JobCard $jobCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function edit(HtCrr $htcrr)
    {
        if ($this->statuses->where('id',$htcrr->progresses->last()->status_id)->first()->code == "open") {
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-open', [
                'htcrr' => $htcrr,
                'status' => $this->statuses->where('code','open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr->progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'htcrr' => $htcrr,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-pause', [
                'htcrr' => $htcrr,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr->progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-close', [
                'htcrr' => $htcrr,
            ]);
        }
        else{
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-close', [
                'htcrr' => $htcrr,
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
    public function update(JobCardUpdate $request, HtCrr $htcrr)
    {
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'open'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard-hardtime-engineer.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'reason_id' =>  Type::ofHtCrrPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard-hardtime-engineer.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                'reason_id' =>  Type::ofHtCrrCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            // $htcrr->approvals()->save(new Approval([
            //     'approvable_id' => $htcrr->id,
            //     'approved_by' => Auth::id(),
            // ]));

            return redirect()->route('frontend.jobcard-hardtime-engineer.index')->with($this->notification);

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
            'code' => 'required|exists:htcrr,code'
          ]);

          if ($validator->fails()) {
            return
            redirect()->route('frontend.jobcard-hardtime-engineer.index')->withErrors($validator)->withInput();
          }

        $search = HtCrr::where('code',$request->code)->first();

        return redirect()->route('frontend.jobcard-hardtime-engineer.edit',$search->uuid);
    }
}
