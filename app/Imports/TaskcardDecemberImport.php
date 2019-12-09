<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Repeat;
use App\Models\Station;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskcardDecemberImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /** Set the task type */
        switch ($row['task_type']) {
            case 'GENERAL VISUAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'General Visual')->first()->id;
                break;
            case 'GENERAL VISUAL INSPECTION':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'General Visual Inspection')->first()->id;
                break;
            case 'INSPECTION':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Inspection')->first()->id;
                break;
            case 'LUBRICATE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Lubrication')->first()->id;
                break;
            case 'OPERATIONAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Operational')->first()->id;
                break;
            case 'RS':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'RS')->first()->id;
                break;
            case 'SV':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'SV')->first()->id;
                break;
            case 'VISUAL CHECK':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Visual Check')->first()->id;
                break;
            case 'VISUAL INSPECTION':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Visual Inspection')->first()->id;
                break;
            case 'VISUAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Visual')->first()->id;
                break;
            case 'DISCARD':
            $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Discard')->first()->id;
                break;
            case 'FUNCTIONAL':
                $task_type = Type::ofTaskCardTask()
                                        ->where('name', 'Functional')->first()->id;
                    break;
            default:
            if(empty($row['task_type'])){
                $work_area = null;
                $task_type = null;
            }else{
                $task_type = Type::ofTaskCardTask()
                    ->where('name', 'like', $row['task_type'])->firstOrCreate([
                        'code'  => str_slug($row['task_type']),
                        'name'  => mb_strtoupper($row['task_type']),
                        'of'    => 'taskcard-task'
                    ]);

                $task_type = $task_type->id;
            }
        }

        /** Set the workarea */

        switch ($row['work_area']) {
            case 'PASS CABIN':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'PASS CABIN')->first()->id;
                break;
            case 'NOSE COMP T':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'LWR NOSE COMPARTMENT')->first()->id;
                break;
            case 'MAIN W/W':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'MAIN WHEEL WELL')->first()->id;
                break;
            case 'APU COMPARTMENT':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'APU COMPARTMENT')->first()->id;
                break;
            case 'LT WING INBD LE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'L WING LEADING EDGE')->first()->id;
                break;
            case 'STRUTS':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'ENGINE/STRUT')->first()->id;
                break;
            case 'TAIL COMPT':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'TAIL COMPARTMENT')->first()->id;
                break;
            case 'A/C BAY':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'FUSELAGE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'FUSELAGE')->first()->id;
                break;
            case 'LEFT ENGINE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'LEFT ENGINE')->first()->id;
                break;
            case 'RIGHT ENGINE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'RIGHT ENGINE')->first()->id;
                break;
            default:
            if(empty($row['work_area'])){
                $work_area = null;
            }else{
                $work_area = Type::ofWorkArea()
                    ->where('name', 'like', $row['work_area'])->firstOrCreate([
                        'code'  => str_slug($row['work_area']),
                        'name'  => mb_strtoupper($row['work_area']),
                        'of'    => 'work-area'
                    ]);
                
                $work_area = $work_area->id;
            }
        }

        switch($row['type']){
            case 'BASIC':
                $taskcard_type = Type::ofTaskCardTypeRoutine()
                        ->where('name', 'Basic')->first()->id;
            break;
            case 'CPCP':
                $taskcard_type = Type::ofTaskCardTypeRoutine()
                        ->where('name', 'CPCP')->first()->id;
            break;
            case 'SIP':
                $taskcard_type = Type::ofTaskCardTypeRoutine()
                        ->where('name', 'SIP')->first()->id;
            break;
            case 'AD':
                $taskcard_type = Type::ofTaskCardTypeNonRoutine()
                        ->where('code', 'ad')->first()->id;
            break;
            case 'SB':
                $taskcard_type = Type::ofTaskCardTypeNonRoutine()
                        ->where('code', 'sb')->first()->id;
            break;
            case 'EO':
                $taskcard_type = Type::ofTaskCardTypeNonRoutine()
                        ->where('code', 'eo')->first()->id;
            break;
            case 'EA':
                $taskcard_type = Type::ofTaskCardTypeNonRoutine()
                        ->where('code', 'ea')->first()->id;
            break;
            case 'CMR':
                $taskcard_type = Type::ofTaskCardTypeNonRoutine()
                        ->where('code', 'cmr')->first()->id;
            break;
            case 'AWL':
                $taskcard_type = Type::ofTaskCardTypeNonRoutine()
                        ->where('code', 'awl')->first()->id;
            break;
            case 'SI':
                $taskcard_type = Type::where('code', 'si')->first()->id;
            break;
            default:
            if(empty($row['task_type'])){
                $work_area = null;
            }else{
                $taskcard_type = Type::ofTaskCardTypeRoutine()
                    ->where('name', 'Basic')->first()->id;
            }
        }

        $additionals = [];
        $document_lib = [];

        if($row['document_library'] && $row['document_library'] !== '-'){
            $document_lib = explode(';', $row['document_library']);
        }

        $additionals["internal_number"] = "";
        $additionals["document_library"] = $document_lib;
        if(array_key_exists('company_task', $row) &&  $row['company_task']) {
            $additionals["internal_number"] = $row['company_task'];
        }
        $additionals =  json_encode($additionals, true);

        if(array_key_exists('source', $row) && isset($row['source'])){
            $source = join(',', explode(';', $row['source']));
        }else{
            $source = null;
        }

        if(array_key_exists('reference', $row) && isset($row['reference'])){
            $reference = $row['reference'];
        }else{
            $reference = null;
        }

        if(array_key_exists('description', $row) && isset($row['description'])){
            $description = $row['description'];
        }elseif(isset($row['instruction'])){
            $description = $row['instruction'];
        }else{
            $description = null;
        }

        $version_json = [];
        if(array_key_exists('version', $row)){
            $versions =  explode(';',$row['version']);
    
            foreach($versions as $version){
                if($version !== '-'){
                    array_push($version_json, $version);
                }
            }
        }
        
        $section_json = [];
        if(array_key_exists('section', $row)){
            $sections =  explode(';',$row['section']);
    
            foreach($sections as $section){
                if($section !== '-'){
                    array_push($section_json, $section);
                }
            }
        }

        $tc = [
            'number' => $row['number'],
            'title' => substr($row['title'],0,255),
            'type_id' => $taskcard_type, // TODO: Import appropriate value
            'task_id' => $task_type, // TODO: Import appropriate value
            'work_area' => $work_area, // TODO: Import appropriate value
            'estimation_manhour' => $row['manhours'],
            'is_rii' => false,
            'performance_factor' => $row['performance_factor'],
            'source' => $source,
            'helper_quantity' => $row['helper_quantity'],
            'engineer_quantity' => $row['engineer_quantity'],
            'effectivity' => $row['effectivity'],
            'ata' => $row['ata'],
            'reference' => $reference,
            'version' => json_encode($version_json, true),
            'description' => $description,
            'section' => json_encode($section_json, true),
            'additionals' => $additionals
        ];

        $taskcard = new TaskCard($tc);

        $result = $taskcard->save();

        // TODO: M-M values:
        // - Table: aircraft_taskcard
        $ac = explode(';', $row['ac']);
        $airplanes = Aircraft::whereIn('code',$ac)->get();
        foreach($airplanes as $airplane){
            $taskcard->aircrafts()->attach($airplane->id);
        }

        // - Table: taskcard_zone
        $zones = [];
        if($row['zone']){
            foreach (explode(';',$row['zone']) as $zone_name ) {
                foreach ($airplanes as $airplane) {
                    if(isset($zone_name)){
                        if($zone_name !== '-'){
                            $zone = Zone::firstOrCreate(
                                ['name' => $zone_name, 'zoneable_id' => $airplane->id, 'zoneable_type' => 'App\Models\Aircraft']
                            );
                            array_push($zones, $zone->id);
                        }
                    }
                }
            }
            $taskcard->zones()->attach($zones);
        }

        // TODO: Polymorph values:
        // - Table: accesses
        $accesses = [];
        if($row['access']){
            foreach (explode(';',$row['access']) as $access_name ) {
                foreach ($airplanes as $airplane) {
                    if(isset($access_name)){
                        if($access_name !== '-'){
                            $access = Access::firstOrCreate(
                                ['name' => $access_name, 'accessable_id' => $airplane->id, 'accessable_type' => 'App\Models\Aircraft']
                            );
                            array_push($accesses, $access->id);
                        }
                    }
                }
            }
            $taskcard->accesses()->attach($accesses);
        }

        if ($row['skill']) {
            $skill_id = Type::where('name','LIKE','%'.$row['skill'].'%')->where('of','taskcard-skill')->first()->id;
            if(Type::where('id',$skill_id)->first()->code == 'eri'){
                $taskcard->skills()->attach(Type::where('code','electrical')->first()->id);
                $taskcard->skills()->attach(Type::where('code','radio')->first()->id);
                $taskcard->skills()->attach(Type::where('code','instrument')->first()->id);
            }
            else{
                $taskcard->skills()->attach($skill_id);
            }
        }

        // - Table: thresholds
        $thresholds = explode(';', $row['threshold']);
        $threshold_types = explode(';', $row['threshold_type']);
        foreach($thresholds as $key => $threshold){
            if($row['threshold_type'] !== '-' && $threshold){
                $threshold_type = Type::ofMaintenanceCycle()->where('name', 'like', '%' . $threshold_types[$key] . '%')->first()->id;
                $taskcard->thresholds()->save(new Threshold([
                    'amount' => $threshold,
                    'type_id' => $threshold_type,
                ]));
            }
        }

        // - Table: repeats
        $repeats = explode(';', $row['repeat']);
        $repeat_type = explode(';', $row['repeat_type']);
        foreach($repeats as $key => $repeat){
            if($row['repeat_type'] !== '-' && $repeat){
                $repeat_type = Type::ofMaintenanceCycle()->where('name', 'like', '%' . $repeat_type[$key] . '%')->first()->id;
                $taskcard->repeats()->save(new Repeat([
                    'amount' => $repeat,
                    'type_id' => $repeat_type,
                    ]));
            }
        }

        if($row['station']){
            foreach ($airplanes as $airplane) {
                if($row['station'] !== '-'){
                    $station = Station::firstOrCreate(
                        ['name' => $row['station'], 'stationable_id' => $airplane, 'stationable_type' => 'App\Models\Aircraft']
                    );
                    $taskcard->stations()->attach($station);
                }
            }
        }
    }
}
