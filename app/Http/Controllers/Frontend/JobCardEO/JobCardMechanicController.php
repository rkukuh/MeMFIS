<?php

namespace App\Http\Controllers\Frontend\JobCardEO;

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

class JobCardMechanicController extends Controller
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
        $srm = [];
        $srm["scheduled_priority"]   = Type::where('id', json_decode($jobcard->origin_jobcardable)->eo_header->scheduled_priority_id)->first();
        $srm["recurrence"]           = Type::where('id', json_decode($jobcard->origin_jobcardable)->eo_header->recurrence_id)->first();
        $srm["manual_affected"]      = Type::where('id', json_decode($jobcard->origin_jobcardable)->eo_header->manual_affected_id)->first();

        foreach($jobcard->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }
        $helper_quantity = json_decode($jobcard->origin_jobcard_helpers);
        if($helper_quantity == null ){
            $helper_quantity = 0;
        }

        // if($jobcard->helpers->where('userID',Auth::id())->first() == null){
        //     return redirect()->route('frontend.jobcard-mechanic.index')->with($this->error_notification);
        // }

        $progresses = $jobcard->progresses->where('progressed_by',Auth::id());

        foreach($progresses as $progress){
            $progress->status .= Status::where('id',$progress->status_id)->first()->name;
        }

        if ($progresses->count() == 0) {
            if(isset($jobcard->progresses[1]) and $this->statuses->where('id',$jobcard->progresses->get(1)->status_id)->first()->code == "progress"){
                return view('frontend.job-card-eo.mechanic.progress-open', [
                    'jobcard' => $jobcard,
                    'materials' => $jobcard->jobcardable->materials,
                    'tools' => $jobcard->jobcardable->tools,
                    'progresses' => $progresses,
                    'status' => $this->statuses->where('code','open')->first(),
                    'helper_quantity' => $helper_quantity,
                'srm' => $srm
                ]);
            }else{
                return redirect()->route('frontend.jobcard.index')->with($this->error_notification);
            }
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.job-card-eo.mechanic.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'progresses' => $progresses,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
                'helper_quantity' => $helper_quantity,
                'srm' => $srm
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.job-card-eo.mechanic.progress-pause', [
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'progresses' => $progresses,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
                'helper_quantity' => $helper_quantity,
                'srm' => $srm
            ]);
        }
        else if($this->statuses->where('id',$progresses->last()->status_id)->first()->code == "closed"){
            return view('frontend.job-card-eo.mechanic.progress-close', [
                'progresses' => $progresses,
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'helper_quantity' => $helper_quantity,
                'srm' => $srm
            ]);
        }
        else{
            return view('frontend.job-card-eo.mechanic.progress-close', [
                'progresses' => $progresses,
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'helper_quantity' => $helper_quantity,
                'srm' => $srm
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
            if($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "open"){
                return redirect()->route('frontend.jobcard.index')->with($this->error_notification);
            }else{
                foreach($request->logbook as $logbook){
                    $jobcard->logbooks()->attach(Type::ofJobCardLogBook()->where('code',$logbook)->first()->id);
                }

                $request->merge(['station_id' => Station::where('uuid',$request->station)->first()->id]);

                $additionals['TSN'] = $request->tsn;
                $additionals['CSN'] = $request->csn;
                $additionals['weight_change'] = $request->weight_change;
                $additionals['center_of_gravity'] = $request->center_of_gravity;

                $jobcard->additionals =json_encode($additionals);
                $jobcard->station_id = $request->station_id;

                $jobcard->save();

                $jobcard->progresses()->save(new Progress([
                    'status_id' =>  $this->statuses->where('code','progress')->first()->id,
                    'progressed_by' => Auth::id()
                ]));
                return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
            }
        }
        else if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'reason_id' =>  Type::ofJobCardPauseReason()->where('uuid',$request->pause)->first()->id,
                'reason_text' =>  $request->reason,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
        }
        else if($this->statuses->where('uuid',$request->progress)->first()->code == 'progress'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','progress')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
        }
        else if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
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
