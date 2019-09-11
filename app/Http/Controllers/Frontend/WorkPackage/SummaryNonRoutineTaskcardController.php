<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\Aircraft;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\WorkPackage;
use App\Models\TaskCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;
class SummaryNonRoutineTaskcardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */

    public function ea(WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = [];
        $taskcards  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ea');
        })->whereNull('eo_instructions.deleted_at')->get();
        
       
            foreach($taskcards as $eo_instruction){

                if (sizeof($eo_instruction->skills) > 1) {
                    $eri++;
                }else{
                    $result = $eo_instruction->skills->map(function ($skills) {
                        return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                    });

                    array_push($subset , $result);
                }
            }

     
    
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
      

        $otr = array_count_values($skill);       
        $otr["eri"] = $eri;
      
        $total_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ea');
        })->count('uuid');
      
        $total_manhour_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ea');
        })->sum('estimation_manhour');
        
        // dd($total_manhour_taskcard);

        return view('frontend.workpackage.nonroutine.ea.ea-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
        // dd($total_manhour_taskcard);
    }

    public function adsb(WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = [];
        $taskcards  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb');
        })->whereNull('eo_instructions.deleted_at')->get();
        
       
            foreach($taskcards as $eo_instruction){

                if (sizeof($eo_instruction->skills) > 1) {
                    $eri++;
                }else{
                    $result = $eo_instruction->skills->map(function ($skills) {
                        return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                    });

                    array_push($subset , $result);
                }
            }

     
    
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
      

        $otr = array_count_values($skill);       
        $otr["eri"] = $eri;
      
        $total_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb');
        })->count('uuid');
      
        $total_manhour_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb');
        })->sum('estimation_manhour');
        
        // dd($total_manhour_taskcard);

        return view('frontend.workpackage.nonroutine.adsb.ad-sb-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
        // dd($total_manhour_taskcard);
    }

    public function eo(WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = [];
        $taskcards  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'eo');
        })->whereNull('eo_instructions.deleted_at')->get();
        
        
            foreach($taskcards as $eo_instruction){
                if (sizeof($eo_instruction->skills) > 1) {
                    $eri++;
                }else{
                    $result = $eo_instruction->skills->map(function ($skills) {
                        return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                    });

                    array_push($subset , $result);
                }
            }

        

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'eo');
        })->count('uuid');

       
        $total_manhour_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'eo');
        })->sum('estimation_manhour');

        return view('frontend.workpackage.nonroutine.eo.eo-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function cmrawl(WorkPackage $workPackage)
    {
        $eri = 0;
        $taskcards  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'cmr')->orWhere('code','awl');
        })->whereNull('eo_instructions.deleted_at')->get();


        $skills = $subset = [];

        foreach($taskcards as $taskcard){
            if (sizeof($taskcard->skills) > 1) {
                $eri++;
            }else{
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset, $result);
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        
        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'cmr')->orWhere('code','awl');
        })->count('uuid');

 

        $total_manhour_taskcard  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'cmr')->orWhere('code','awl');
        })->sum('estimation_manhour');
       
        return view('frontend.workpackage.nonroutine.cmrawl.cmr-awl-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function si(WorkPackage $workPackage)
    {
        $eri = 0;
        $taskcards  = $workPackage->taskcards->load('type')->where('type.code', 'si');
        $skills = $subset = [];

        foreach($taskcards as $taskcard){
            if (sizeof($taskcard->skills) > 1) {
                $eri++;
            }else{
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                });

                array_push($subset , $result);
            }
        }
        
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.code', 'si')->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->load('type')->where('type.code', 'si')->sum('estimation_manhour');

        return view('frontend.workpackage.nonroutine.si.si-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function summary(WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = [];

        $taskcards  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb')
            ->orWhere('code','cmr')->orWhere('code','awl')
            ->orWhere('code','ea')->orWhere('code','eo');
        })->whereNull('eo_instructions.deleted_at')->get();

        foreach($taskcards as $eo_instruction){
            if (sizeof($eo_instruction->skills) > 1) {
                $eri++;
            } else {
                $result = $eo_instruction->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset, $result);
            }
        }

        $adsb  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb');
        })->whereNull('eo_instructions.deleted_at')->count();

        $cmrawl  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'cmr')->orWhere('code','awl');
        })->whereNull('eo_instructions.deleted_at')->count();

        $si  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'si');
        })->whereNull('eo_instructions.deleted_at')->count();

        $ea  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'ea');
        })->whereNull('eo_instructions.deleted_at')->count();

        $eo  = $workPackage->eo_instructions()->with('eo_header.type')
        ->whereHas('eo_header.type', function ($query) {
            $query->where('code', 'eo');
        })->whereNull('eo_instructions.deleted_at')->count();

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $taskcards->count();
        $total_manhour_taskcard  = $taskcards->sum('estimation_manhour');

        return view('frontend.workpackage.nonroutine.summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'workPackage' => $workPackage,
            'adsb' => $adsb,
            'cmrawl' => $cmrawl,
            'otr' => $otr,
            'si' => $si,
            'ea' => $ea,
            'eo' => $eo,
        ]);
    }

}
