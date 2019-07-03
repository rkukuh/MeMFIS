<?php

namespace App\Http\Controllers\Frontend\JobCard;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardEngineerController extends Controller
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
        $this->statuses = Status::ofJobCard()->get();
        $this->break = Type::ofJobCardPauseReason()->where('code','break-time')->first()->uuid;
        $this->waiting = Type::ofJobCardPauseReason()->where('code','waiting-material')->first()->uuid;
        $this->other = Type::ofJobCardPauseReason()->where('code','other')->first()->uuid;
        $this->accomplished = Type::ofJobCardCloseReason()->where('code','accomplished')->first()->uuid;
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
    public function edit(JobCard $jobcard)
    {
        $progresses = $jobcard->progresses->where('progressed_by',Auth::id());
        $employees = Employee::all();
        foreach($progresses as $progress){
            $progress->status .= Status::where('id',$progress->status_id)->first()->name;
        }

        if ($progresses->count() == 0 and $this->statuses->where('id',$jobcard->progresses->first()->status_id)->first()->code == "open") {
            return view('frontend.job-card.engineer.progress-open', [
                'jobcard' => $jobcard,
                'materials' => $jobcard->taskcard->materials,
                'tools' => $jobcard->taskcard->tools,
                'progresses' => $progresses,
                'status' => $this->statuses->where('code','open')->first(),
                'employees' => $employees,
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.job-card.engineer.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'jobcard' => $jobcard,
                'materials' => $jobcard->taskcard->materials,
                'tools' => $jobcard->taskcard->tools,
                'progresses' => $progresses,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.job-card.engineer.progress-pause', [
                'jobcard' => $jobcard,
                'materials' => $jobcard->taskcard->materials,
                'tools' => $jobcard->taskcard->tools,
                'progresses' => $progresses,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.job-card.engineer.progress-close', [
                'jobcard' => $jobcard,
                'materials' => $jobcard->taskcard->materials,
                'tools' => $jobcard->taskcard->tools,
                'progresses' => $progresses,
            ]);
        }
        else{
            return view('frontend.job-card.engineer.progress-close', [
                'jobcard' => $jobcard,
                'materials' => $jobcard->taskcard->materials,
                'tools' => $jobcard->taskcard->tools,
                'progresses' => $progresses,
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
            return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'reason_id' =>  Type::ofJobCardPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));

            return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){

            foreach($jobcard->progresses->groupby('progressed_by') as $key => $value){
                if($this->statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code == "pending"){
                    return redirect()->route('frontend.jobcard.index')->with($this->error_notification);
                }
            }

            foreach($jobcard->progresses->groupby('progressed_by') as $key => $value){
                if($this->statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code <> "closed"){
                    $jobcard->progresses()->save(new Progress([
                        'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                        'reason_id' =>  Type::ofJobCardCloseReason()->where('uuid',$request->accomplishment)->first()->id,
                        'reason_text' =>  $request->note,
                        'progressed_by' =>  $key
                    ]));
                }
            }

            if($request->discrepancy == 1){
                return redirect()->route('frontend.discrepancy.jobcard.engineer.discrepancy',$jobcard->uuid);
            }
            else{
                return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
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

}
