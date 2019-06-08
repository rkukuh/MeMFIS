<?php

namespace App\Http\Controllers\Frontend\JobCard;

use Auth;
use Validator;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardEngineerController extends Controller
{
    protected $statuses;

    public function __construct()
    {
        $this->statuses = Status::ofJobCard()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.job-card.engineer.index');
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
        if ($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "open") {
            return view('frontend.job-card.engineer.progress-open', [
                'jobcard' => $jobcard,
                'status' => $this->statuses->where('code','open')->first(),
            ]);
        }
        else if($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "progress"){
            return view('frontend.job-card.engineer.progress-resume', [
                'jobcard' => $jobcard,
                'pending' => $this->statuses->where('code','pending')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
            ]);
        }
        else if($this->statuses->where('id',$jobcard->progresses->last()->status_id)->first()->code == "pending"){
            return view('frontend.job-card.engineer.progress-pause', [
                'jobcard' => $jobcard,
                'open' => $this->statuses->where('code','open')->first(),
                'closed' => $this->statuses->where('code','closed')->first(),
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
            return redirect()->route('frontend.jobcard-engineer.index');
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'pending'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','pending')->first()->id,
                'progressed_by' => Auth::id()
            ]));
            return redirect()->route('frontend.jobcard-engineer.index');
        }
        if($this->statuses->where('uuid',$request->progress)->first()->code == 'closed'){
            $jobcard->progresses()->save(new Progress([
                'status_id' =>  $this->statuses->where('code','closed')->first()->id,
                'progressed_by' => Auth::id()
            ]));

            $jobcard->approvals()->save(new Approval([
                'approvable_id' => $jobcard->id,
                'approved_by' => Auth::id(),
            ]));
            return redirect()->route('frontend.jobcard-engineer.index');
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
            redirect()->route('frontend.jobcard-engineer.index')->withErrors($validator)->withInput();
          }

        $search = JobCard::where('number',$request->number)->first();

        return redirect()->route('frontend.jobcard-engineer.edit',$search->uuid);
    }
}
