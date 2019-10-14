<?php

namespace App\Http\Controllers\Frontend\JobCardHardTime;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\HtCrr;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardHardTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.job-card-hard-time.index');
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
        if($htcrr->type->code == 'parent'){
            //TODO Validasi User'skill with HtCrr Skill
            if($htcrr->progresses->first()->progressed_by == Auth::id()){
                $error_notification = array(
                    'message' => "You can't run this jobcard",
                    'title' => "Danger",
                    'alert-type' => "error"
                );
                return redirect()->route('frontend.jobcard.hardtime.index')->with($error_notification);
            }else{
                foreach($htcrr->helpers as $helper){
                    $helper->userID .= $helper->user->id;
                }

                if($htcrr->helpers->where('userID',Auth::id())->first() == null){
                    return redirect()->route('frontend.jobcard-hardtime-engineer.edit',$htcrr->uuid);
                }
                else{

                    return redirect()->route('frontend.jobcard-hardtime-mechanic.edit',$htcrr->uuid);
                }
            }
        }elseif($htcrr->type->code == 'removal'){

            //??Ambugi fucntion

            $htcrr = $htcrr->parent;

            if($htcrr->progresses->first()->progressed_by == Auth::id()){
                $error_notification = array(
                    'message' => "You can't run this jobcard",
                    'title' => "Danger",
                    'alert-type' => "error"
                );
                return redirect()->route('frontend.jobcard.hardtime.index')->with($error_notification);
            }else{
                foreach($htcrr->helpers as $helper){
                    $helper->userID .= $helper->user->id;
                }

                if($htcrr->helpers->where('userID',Auth::id())->first() == null){
                    return redirect()->route('frontend.jobcard-hardtime-engineer.edit',$htcrr->uuid);
                }
                else{

                    return redirect()->route('frontend.jobcard-hardtime-mechanic.edit',$htcrr->uuid);
                }
            }
        }elseif($htcrr->type->code == 'installation'){

            //??Ambugi fucntion

            $htcrr = $htcrr->parent;

            if($htcrr->progresses->first()->progressed_by == Auth::id()){
                $error_notification = array(
                    'message' => "You can't run this jobcard",
                    'title' => "Danger",
                    'alert-type' => "error"
                );
                return redirect()->route('frontend.jobcard.hardtime.index')->with($error_notification);
            }else{
                foreach($htcrr->helpers as $helper){
                    $helper->userID .= $helper->user->id;
                }

                if($htcrr->helpers->where('userID',Auth::id())->first() == null){
                    return redirect()->route('frontend.jobcard-hardtime-engineer.edit',$htcrr->uuid);
                }
                else{

                    return redirect()->route('frontend.jobcard-hardtime-mechanic.edit',$htcrr->uuid);
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardUpdate  $request
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, JobCard $jobCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCard $jobCard)
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
            redirect()->route('frontend.jobcard.hardtime.index')->withErrors($validator)->withInput();
        }

        $search = HtCrr::where('code',$request->code)->first();

        return redirect()->route('frontend.jobcard.hardtime.edit',$search->uuid);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function print(HtCrr $htcrr)
    {
        $pdf = \PDF::loadView('frontend/form/jobcard_cri',[
            'htcrr' => $htcrr,
        ]);
    return $pdf->stream();
    }
}
