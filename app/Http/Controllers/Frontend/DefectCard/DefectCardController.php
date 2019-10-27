<?php

namespace App\Http\Controllers\Frontend\DefectCard;

use Auth;
use App;
use Carbon\Carbon;
use App\Models\Status;
use iio\libmergepdf\Merger;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use stdClass;

class DefectCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.defect-card.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $defectcard)
    {
        $propose_corrections = array();
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $propose_corrections[$i] =  $defectCard->code;
        }

        $propose_correction_text = '';
        foreach($defectcard->propose_corrections as $i => $defectCard){
            $propose_correction_text =  $defectCard->pivot->propose_correction_text;
        }

        return view('frontend.defect-card.progress-close', [
            'defectcard' => $defectcard,
            'propose_corrections' => $propose_corrections,
            'propose_correction_text' => $propose_correction_text,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $defectcard)
    {
        if($defectcard->quotation_additional == null){
            $error_notification = array(
                'message' => "Quotation Additional hasn't been created",
                'title' => "Danger",
                'alert-type' => "error");

            return redirect()->route('frontend.defectcard.index')->with($error_notification);
        }
        elseif(sizeOf($defectcard->quotation_additional->approvals->toArray()) >= 1){
            //TODO Validasi User'skill with DefectCard Skill
            foreach($defectcard->helpers as $helper){
                $helper->userID .= $helper->user->id;
            }

            if($defectcard->helpers->where('userID',Auth::id())->first() == null){
                return redirect()->route('frontend.defectcard-engineer.edit',$defectcard->uuid);
            }
            else{
                return redirect()->route('frontend.defectcard-mechanic.edit',$defectcard->uuid);
            }
        }else{
            $error_notification = array(
                'message' => "Quotation Additional hasn't been approved",
                'title' => "Danger",
                'alert-type' => "error");

            return redirect()->route('frontend.defectcard.index')->with($error_notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefectCard $defectCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DefectCard  $defectCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefectCard $defectCard)
    {
        //
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function print(DefectCard $defectcard)
    {
        $m = new Merger();
        $statuses = Status::ofDefectCard()->get();

        $date_close = $released = [];

        $progresses_groups = $defectcard->progresses->groupBy('progressed_by')->sortBy('created_at');
        $actual_manhours = [];
        foreach($progresses_groups as $progresses_group){
            //calculating defect card's actual manhours
            $manhours = null;
            foreach($progresses_group as $key => $progress){
                $status = $statuses->find($progress->status_id)->code;
                // dump($status);
                // close date
                if($status == "closed"){
                    $date_close[$progress->progressedBy->id] = $progress->created_at;
                }

                // close date
                if($status == "released"){
                    $temporary = new stdClass();
                    $temporary->released_at = $progress->created_at;
                    $temporary->by = $progress->progressedBy->first_name.' '.$progress->progressedBy->last_name;
                    array_push($released, $temporary);
                }

                if($status == "progress"){
                    if( ($key + 1) < sizeof($progresses_group) && isset($progress[$key])){
                        $t1 = Carbon::parse($progress->created_at);
                        $t2 = Carbon::parse($progress[$key + 1]->created_at);
                        $diff = $t1->diffInSeconds($t2);
                        $manhours = $manhours + $diff;
                    }else{
                        $t1 = Carbon::parse($progress->created_at);
                        $t2 = Carbon::now();
                        $diff = $t1->diffInSeconds($t2);
                        $manhours = $manhours + $diff;
                    }
                }
            }

            $manhours = $manhours/3600;
            $actual_manhours[$progress->progressedBy->id] = $manhours;
        }

        // dd("break");

        $zones = $defectcard->zones->pluck('name')->toArray();
        $zones = join(',', $zones);
        
        if($defectcard->jobcard->jobcardable_type == "App\Models\TaskCard"){
            $defectcard->company_number    .= json_decode($defectcard->jobcard->jobcardable->additionals)->internal_number;
        }else if($defectcard->jobcard->jobcardable_type == "App\Models\EOInstruction"){
            $defectcard->company_number    .= json_decode($defectcard->jobcard->jobcardable->eo_header->additionals)->internal_number;
        }

        $propose_corrections = $defectcard->propose_corrections->pluck('code')->toArray();
        if(in_array('other',$propose_corrections)){
            $other = $defectcard->propose_corrections->where('code','other')->first();
            $text = $other->pivot->propose_correction_text;
        }else{
            $text = "";
        }
        $view1 = \View::make('frontend.form.dc_page1')->with(['defectcard' => $defectcard,'propose_corrections'=> $propose_corrections, 'text'=> $text, 'zones' => $zones, 'actual_manhours' => $actual_manhours, 'date_close' => $date_close])->render();
        $view2 = \View::make('frontend.form.dc_page2')->with('defectcard', $defectcard)->render();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view1)->setPaper('a4', 'portrait');
        $m->addRaw($pdf->output());

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view2)->setPaper('a4', 'landscape');
        $m->addRaw($pdf->output());

        file_put_contents('storage/DefectCard/'.$defectcard->uuid.'.pdf', $m->merge());
        $invnoabc = new \PDF;
        $invnoabc = $defectcard->uuid.'.pdf';

        return response()->file(
            public_path('storage/DefectCard/'.$defectcard->uuid.'.pdf')
        );
    }
}
