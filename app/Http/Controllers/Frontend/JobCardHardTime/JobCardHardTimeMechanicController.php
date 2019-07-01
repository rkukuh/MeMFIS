<?php

namespace App\Http\Controllers\Frontend\JobCardHardTime;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\HtCrr;
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
    protected $success_notification;
    protected $error_notification;


    public function __construct()
    {
        $this->statuses = Status::ofHtCrr()->get();
        $this->break = Type::ofHtCrrPauseReason()->where('code','break-time')->first()->uuid;
        $this->waiting = Type::ofHtCrrPauseReason()->where('code','waiting-material')->first()->uuid;
        $this->other = Type::ofHtCrrPauseReason()->where('code','other')->first()->uuid;
        $this->accomplished = Type::ofHtCrrCloseReason()->where('code','accomplished')->first()->uuid;
        $this->success_notification = array(
            'message' => "JobCard's status has been updated",
            'title' => "Success",
            'alert-type' => "success"
        );
        $this->error_notification = array(
            'message' => "JobCard's status can't updated",
            'title' => "Danger",
            'alert-type' => "error"
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
     * @param  \App\Models\HrCrr  $htcrr
     * @return \Illuminate\Http\Response
     */
    public function show(HtCrr $htcrr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HrCrr  $htcrr
     * @return \Illuminate\Http\Response
     */
    public function edit(HtCrr $htcrr)
    {
        foreach($htcrr->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }

        $progresses = $htcrr->progresses->where('progressed_by',Auth::id());

        foreach($progresses as $progress){
            $progress->status .= Status::where('id',$progress->status_id)->first()->name;
        }

        if ($this->statuses->where('id',$htcrr->progresses->last()->status_id)->first()->code == "removal-open") {

        }
        if ($progresses->count() == 0) {
            if(isset($htcrr->progresses[1]) and $this->statuses->where('id',$htcrr->progresses->get(1)->status_id)->first()->code == "removal-progress"){
                return view('frontend.job-card-hard-time.mechanic.progress.removal.progress-open', [
                    'htcrr' => $htcrr,
                    'status' => $this->statuses->where('code','removal-open')->first(),
                ]);
            }else{
                return redirect()->route('frontend.jobcard.hardtime.index')->with($this->error_notification);
            }
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "removal-progress"){
            return view('frontend.job-card-hard-time.mechanic.progress.removal.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'htcrr' => $htcrr,
                'pending' => $this->statuses->where('code','removal-pending')->first(),
                'closed' => $this->statuses->where('code','removal-closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "removal-pending"){
            return view('frontend.job-card-hard-time.mechanic.progress.removal.progress-pause', [
                'htcrr' => $htcrr,
                'open' => $this->statuses->where('code','removal-open')->first(),
                'closed' => $this->statuses->where('code','removal-closed')->first(),
            ]);
        }
        else if ($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "installation-open") {
            return view('frontend.job-card-hard-time.mechanic.progress.installation.progress-open', [
                'htcrr' => $htcrr,
                'status' => $this->statuses->where('code','installation-open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "installation-progress"){
            return view('frontend.job-card-hard-time.mechanic.progress.installation.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'htcrr' => $htcrr,
                'pending' => $this->statuses->where('code','installation-pending')->first(),
                'closed' => $this->statuses->where('code','installation-closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "installation-pending"){
            return view('frontend.job-card-hard-time.mechanic.progress.installation.progress-pause', [
                'htcrr' => $htcrr,
                'open' => $this->statuses->where('code','installation-open')->first(),
                'closed' => $this->statuses->where('code','installation-closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "installation-closed"){
            return view('frontend.job-card-hard-time.mechanic.progress.installation.progress-close', [
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
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'removal-open'){
            if($this->statuses->where('id',$htcrr->progresses->last()->status_id)->first()->code == "removal-open"){
                return redirect()->route('frontend.jobcard.hardtime.index')->with($this->error_notification);
            }else{
                $htcrr->progresses()->save(new Progress([
                    'status_id' =>  $this->statuses->where('code','removal-progress')->first()->id,
                    'progressed_by' => Auth::id()
                ]));
                return redirect()->route('frontend.jobcard.hardtime.index')->with($this->success_notification);
            }
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'removal-pending'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','removal-pending')->first()->id,
                'reason_id' =>  Type::ofHtCrrPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->success_notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'removal-closed'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','removal-closed')->first()->id,
                'reason_id' =>  Type::ofHtCrrCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            $htcrr->progresses()->save(new Progress([
                'status_id' =>  Status::where('code','installation-open')->first()->id,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->success_notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'installation-open'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','installation-progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->success_notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'installation-pending'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','installation-pending')->first()->id,
                'reason_id' =>  Type::ofHtCrrPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->success_notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'installation-closed'){
            $htcrr->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','installation-closed')->first()->id,
                'reason_id' =>  Type::ofHtCrrCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                'reason_text' =>  $request->note,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.hardtime.index')->with($this->success_notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(HtCrr $htcrr)
    {
        //
    }
}
