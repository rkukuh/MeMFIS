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
        //
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
        // $progresses = $jobcard->progresses->where('progressed_by',Auth::id());

        $htcrr_removal = HtCrr::where('parent_id',$htcrr->id)->where('type_id',Type::ofHtCrrType()->where('code','removal')->first()->id)->first();
        $htcrr_installation = HtCrr::where('parent_id',$htcrr->id)->where('type_id',Type::ofHtCrrType()->where('code','installation')->first()->id)->first();

        if ($this->statuses->where('id',$htcrr_removal->progresses->last()->status_id)->first()->code == "removal-open") {
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-open', [
                'htcrr' => $htcrr_removal,
                'status' => $this->statuses->where('code','removal-open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr_removal->progresses->last()->status_id)->first()->code == "removal-progress"){
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'htcrr' => $htcrr_removal,
                'pending' => $this->statuses->where('code','removal-pending')->first(),
                'closed' => $this->statuses->where('code','removal-closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr_removal->progresses->last()->status_id)->first()->code == "removal-pending"){
            return view('frontend.job-card-hard-time.engineer.progress.removal.progress-pause', [
                'htcrr' => $htcrr_removal,
                'open' => $this->statuses->where('code','removal-open')->first(),
                'closed' => $this->statuses->where('code','removal-closed')->first(),
            ]);
        }
        else if ($this->statuses->where('id',$htcrr_installation->progresses->last()->status_id)->first()->code == "installation-open") {
            return view('frontend.job-card-hard-time.engineer.progress.installation.progress-open', [
                'htcrr' => $htcrr_installation,
                'status' => $this->statuses->where('code','installation-open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr_installation->progresses->last()->status_id)->first()->code == "installation-progress"){
            return view('frontend.job-card-hard-time.engineer.progress.installation.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'htcrr' => $htcrr_installation,
                'pending' => $this->statuses->where('code','installation-pending')->first(),
                'closed' => $this->statuses->where('code','installation-closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr_installation->progresses->last()->status_id)->first()->code == "installation-pending"){
            return view('frontend.job-card-hard-time.engineer.progress.installation.progress-pause', [
                'htcrr' => $htcrr_installation,
                'open' => $this->statuses->where('code','installation-open')->first(),
                'closed' => $this->statuses->where('code','installation-closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$htcrr_installation->progresses->last()->status_id)->first()->code == "installation-closed"){
            return view('frontend.job-card-hard-time.engineer.progress.installation.progress-close', [
                'htcrr' => $htcrr_installation,
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
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'removal-open'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','removal-progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'removal-pending'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','removal-pending')->first()->id,
                'reason_id' =>  Type::ofHtCrrPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'removal-closed'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','removal-closed')->first()->id,
                'reason_id' =>  Type::ofHtCrrCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            $htcrr_installation = HtCrr::where('parent_id',$htcrr->parent_id)->where('type_id',Type::ofHtCrrType()->where('code','installation')->first()->id)->first();

            $htcrr_installation->progresses()->save(new Progress([
                'status_id' =>  Status::where('code','installation-open')->first()->id,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'installation-open'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','installation-progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'installation-pending'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','installation-pending')->first()->id,
                'reason_id' =>  Type::ofHtCrrPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'installation-closed'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','installation-closed')->first()->id,
                'reason_id' =>  Type::ofHtCrrCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->notification);
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

}
