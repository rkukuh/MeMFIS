<?php

namespace App\Http\Controllers\Frontend\JobCard;

use Auth;
use Validator;
use carbon\Carbon;
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
        $statuses = Status::ofJobCard()->get();
        $taskcard = json_decode($jobcard->origin_jobcardable);
        $helper_quantity = json_decode($jobcard->origin_jobcard_helpers);
        if($helper_quantity == null ){
            $helper_quantity = 0;
        }
        $jobcard = JobCard::where('uuid',$jobcard->uuid)->first();
        foreach($jobcard->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }
        $manhours = 0;
        foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1 = null;
            foreach($values as $value){
                if($statuses->where('id',$value->status_id)->first()->code <> "open" or $statuses->where('id',$value->status_id)->first()->code <> "released" or $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                    if($jobcard->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            $t1 = Carbon::parse($date1);
                            $t2 = Carbon::parse($value->created_at);
                            $diff = $t1->diffInSeconds($t2);
                            $manhours = $manhours + $diff;
                        }
                        $date1 = $value->created_at;
                    }
                }

            }
        }
        $manhours = $manhours/3600;
        $manhours_break = 0;
        foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            for($i=0; $i<sizeOf($values->toArray()); $i++){
                if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                    if($jobcard->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            if($i+1 < sizeOf($values->toArray())){
                                $t2 = Carbon::parse($values[$i]->created_at);
                                $t3 = Carbon::parse($values[$i+1]->created_at);
                                $diff = $t2->diffInSeconds($t3);
                                $manhours_break = $manhours_break + $diff;
                            }
                        }
                    }
                }
            }
        }
        $manhours_break = $manhours_break/3600;
        $actual =number_format($manhours-$manhours_break, 2);

        $progresses_groups = $jobcard->progresses->groupBy('progressed_by');
        $employees = Employee::all();
        foreach($progresses_groups as $progresses_group){
            foreach($progresses_group as $progress){
                $progress->status .= Status::where('id',$progress->status_id)->first()->name;
            }
        }

        $progresses =  $jobcard->progresses->where('progressed_by', Auth::id());


        if ($progresses->count() == 0 and $this->statuses->where('id',$jobcard->progresses->first()->status_id)->first()->code == "open") {
            return view('frontend.job-card.engineer.progress-open', [
                'jobcard' => $jobcard,
                'taskcard' => $taskcard,
                'employees' => $employees,
                'progresses' => $progresses,
                'progresses_groups' => $progresses_groups,
                'helper_quantity' => $helper_quantity,
                'tools' => $jobcard->jobcardable->tools,
                'materials' => $jobcard->jobcardable->materials,
                'status' => $this->statuses->where('code','open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.job-card.engineer.progress-resume', [
                'jobcard' => $jobcard,
                'taskcard' => $taskcard,
                'break' => $this->break,
                'other' => $this->other,
                'waiting' => $this->waiting,
                'progresses' => $progresses,
                'progresses_groups' => $progresses_groups,
                'helper_quantity' => $helper_quantity,
                'accomplished' => $this->accomplished,
                'tools' => $jobcard->jobcardable->tools,
                'materials' => $jobcard->jobcardable->materials,
                'closed' => $this->statuses->where('code','closed')->first(),
                'pending' => $this->statuses->where('code','pending')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.job-card.engineer.progress-pause', [
                'jobcard' => $jobcard,
                'taskcard' => $taskcard,
                'progresses' => $progresses,
                'progresses_groups' => $progresses_groups,
                'helper_quantity' => $helper_quantity,
                'tools' => $jobcard->jobcardable->tools,
                'materials' => $jobcard->jobcardable->materials,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.job-card.engineer.progress-close', [
                'actual' => $actual,
                'jobcard' => $jobcard,
                'taskcard' => $taskcard,
                'progresses' => $progresses,
                'progresses_groups' => $progresses_groups,
                'helper_quantity' => $helper_quantity,
                'tools' => $jobcard->jobcardable->tools,
                'materials' => $jobcard->jobcardable->materials,
            ]);
        }
        else{
            return view('frontend.job-card.engineer.progress-close', [
                'jobcard' => $jobcard,
                'taskcard' => $taskcard,
                'progresses' => $progresses,
                'progresses_groups' => $progresses_groups,
                'helper_quantity' => $helper_quantity,
                'tools' => $jobcard->jobcardable->tools,
                'materials' => $jobcard->jobcardable->materials,
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

            if($request->helper){
                $helpers = Employee::whereIn('code',$request->helper)->pluck('id');
                $jobcard->helpers()->sync($helpers);
            }

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
                if($this->statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code <> "closed" and $this->statuses->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code <> "open"){
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
