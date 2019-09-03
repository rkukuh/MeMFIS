<?php

namespace App\Http\Controllers\Frontend\JobCardEO;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;
use App\Models\Employee;
use App\Models\JobCard;
use App\Models\Progress;
use App\Models\Status;
use App\Models\Type;
use App\Models\Station;
use Auth;
use carbon\Carbon;
use Illuminate\Http\Request;

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
        $this->break = Type::ofJobCardPauseReason()->where('code', 'break-time')->first()->uuid;
        $this->waiting = Type::ofJobCardPauseReason()->where('code', 'waiting-material')->first()->uuid;
        $this->other = Type::ofJobCardPauseReason()->where('code', 'other')->first()->uuid;
        $this->accomplished = Type::ofJobCardCloseReason()->where('code', 'accomplished')->first()->uuid;
        $this->success_notification = array(
            'message' => "JobCard's status has been updated",
            'title' => "Success",
            'alert-type' => "success",
        );
        $this->error_notification = array(
            'message' => "JobCard's status can't updated",
            'title' => "Danger",
            'alert-type' => "error",
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
        // $jobcard = JobCard::where('uuid', $jobcard->uuid)->first();
        foreach ($jobcard->helpers as $helper) {
            $helper->userID .= $helper->user->id;
        }
        $manhours = 0;
        foreach ($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values) {
            $date1 = null;
            foreach ($values as $value) {
                if ($statuses->where('id', $value->status_id)->first()->code != "open" or $statuses->where('id', $value->status_id)->first()->code != "released" or $statuses->where('id', $value->status_id)->first()->code != "rii-released") {
                    if ($jobcard->helpers->where('userID', $key)->first() == null) {
                        if ($date1 != null) {
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
        $manhours = $manhours / 3600;
        $manhours_break = 0;
        foreach ($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values) {
            for ($i = 0; $i < sizeOf($values->toArray()); $i++) {
                if ($statuses->where('id', $values[$i]->status_id)->first()->code == "pending") {
                    if ($jobcard->helpers->where('userID', $key)->first() == null) {
                        if ($date1 != null) {
                            if ($i + 1 < sizeOf($values->toArray())) {
                                $t2 = Carbon::parse($values[$i]->created_at);
                                $t3 = Carbon::parse($values[$i + 1]->created_at);
                                $diff = $t2->diffInSeconds($t3);
                                $manhours_break = $manhours_break + $diff;
                            }
                        }
                    }
                }
            }
        }
        $manhours_break = $manhours_break / 3600;
        $actual = number_format($manhours - $manhours_break, 2);

        $progresses = $jobcard->progresses->where('progressed_by', Auth::id());
        $employees = Employee::all();
        foreach ($progresses as $progress) {
            $progress->status .= Status::where('id', $progress->status_id)->first()->name;
        }

        if ($progresses->count() == 0 and $this->statuses->where('id', $jobcard->progresses->first()->status_id)->first()->code == "open") {
            return view('frontend.job-card-eo.engineer.progress-open', [
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code'),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'progresses' => $progresses,
                'status' => $this->statuses->where('code', 'open')->first(),
                'employees' => $employees,
            ]);
        } else if ($this->statuses->where('id', $progresses->last()->status_id)->first()->code == "progress") {
            return view('frontend.job-card-eo.engineer.progress-resume', [
                'break' => $this->break,
                'waiting' => $this->waiting,
                'other' => $this->other,
                'accomplished' => $this->accomplished,
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'progresses' => $progresses,
                'pending' => $this->statuses->where('code', 'pending')->first(),
                'closed' => $this->statuses->where('code', 'closed')->first(),
            ]);
        } else if ($this->statuses->where('id', $progresses->last()->status_id)->first()->code == "pending") {
            return view('frontend.job-card-eo.engineer.progress-pause', [
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'progresses' => $progresses,
                'open' => $this->statuses->where('code', 'open')->first(),
                'closed' => $this->statuses->where('code', 'closed')->first(),
            ]);
        } else if ($this->statuses->where('id', $progresses->last()->status_id)->first()->code == "closed") {
            return view('frontend.job-card-eo.engineer.progress-close', [
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
                'progresses' => $progresses,
                'actual' => $actual,
            ]);
        } else {
            return view('frontend.job-card-eo.engineer.progress-close', [
                'jobcard' => $jobcard,
                'logbooks' => $jobcard->logbooks->pluck('code')->toarray(),
                'materials' => $jobcard->jobcardable->materials,
                'tools' => $jobcard->jobcardable->tools,
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
        if ($this->statuses->where('uuid', $request->progress)->first()->code == 'open') {
            if (isset($request->logbook)) {
                foreach ($request->logbook as $logbook) {
                    $jobcard->logbooks()->attach(Type::ofJobCardLogBook()->where('code', $logbook)->first()->id);
                }
            }

            $request->merge(['station_id' => Station::where('uuid',$request->station)->first()->id]);

            $additionals['TSN'] = $request->tsn;
            $additionals['CSN'] = $request->csn;

            $jobcard->additionals =json_encode($additionals);
            $jobcard->station_id = $request->station_id;
            $jobcard->save();

            $jobcard->progresses()->save(new Progress([
                'status_id' => $this->statuses->where('code', 'progress')->first()->id,
                'progressed_by' => Auth::id(),
            ]));

            if ($request->helper) {
                $helper = Employee::whereIn('code', $request->helper)->pluck('id');
                $jobcard->helpers()->sync($helper);
            }

            return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
        }
        if ($this->statuses->where('uuid', $request->progress)->first()->code == 'pending') {
            $jobcard->progresses()->save(new Progress([
                'status_id' => $this->statuses->where('code', 'pending')->first()->id,
                'reason_id' => Type::ofJobCardPauseReason()->where('uuid', $request->pause)->first()->id,
                'reason_text' => $request->reason,
                'progressed_by' => Auth::id(),
            ]));

            return redirect()->route('frontend.jobcard.index')->with($this->success_notification);
        }
        if ($this->statuses->where('uuid', $request->progress)->first()->code == 'closed') {

            foreach ($jobcard->progresses->groupby('progressed_by') as $key => $value) {
                if ($this->statuses->where('id', $jobcard->progresses->where('progressed_by', $key)->last()->status_id)->first()->code == "pending") {
                    return redirect()->route('frontend.jobcard.index')->with($this->error_notification);
                }
            }

            foreach ($jobcard->progresses->groupby('progressed_by') as $key => $value) {
                if ($this->statuses->where('id', $jobcard->progresses->where('progressed_by', $key)->last()->status_id)->first()->code != "closed" and $this->statuses->where('id', $jobcard->progresses->where('progressed_by', $key)->last()->status_id)->first()->code != "open") {
                    $jobcard->progresses()->save(new Progress([
                        'status_id' => $this->statuses->where('code', 'closed')->first()->id,
                        'reason_id' => Type::ofJobCardCloseReason()->where('uuid', $request->accomplishment)->first()->id,
                        'reason_text' => $request->note,
                        'progressed_by' => $key,
                    ]));
                }
            }

            if ($request->discrepancy == 1) {
                return redirect()->route('frontend.discrepancy.jobcard.engineer.discrepancy', $jobcard->uuid);
            } else {
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
