<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use App\Models\Repeat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskCardsCNimport implements ToModel, WithHeadingRow
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
            default:
                $task_type = null;
        }

        /** Set the workarea */
        $work_areas = explode(';',$row['work_area']);
        
        switch ($work_areas[0]) {
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
                $work_area = Type::ofWorkArea()
                    ->where('name','like', $work_areas[0])->first()->id;

        }

        switch($row['type'] ){
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
            default:
                $taskcard_type = Type::ofTaskCardTypeRoutine()
                    ->where('name', 'Basic')->first()->id;
        }
       

        $taskcard =  new TaskCard([
            'number' => $row['number'],
            'title' => $row['title'],
            'type_id' => $taskcard_type, // TODO: Import appropriate value
            'task_id' => $task_type, // TODO: Import appropriate value
            'skill_id' => null, // TODO: Import appropriate value
            'work_area' => $work_area, // TODO: Import appropriate value
            'estimation_manhour' => $row['manhours'],
            'is_rii' => $row['is_rii'],
            'source' => $row['source'],
            'effectivity' => $row['effectivity'],
            'ata' => $row['ata'],
            'reference' => $row['reference'],
            'version' => json_encode(explode(';',$row['version'])),
            'description' => $row['description'],
        ]);

        $taskcard->save();


        // TODO: M-M values:
        // - Table: aircraft_taskcard
        $airplanes = Aircraft::where('name','CN-235')->get();

        foreach($airplanes as $airplane){
            $taskcard->aircrafts()->attach($airplane->id);
        }

        // - Table: taskcard_zone
        $zones = [];
        if($row['zone']){
            foreach (explode(';',$row['zone']) as $zone_name ) {
                foreach ($airplanes as $airplane) {
                    if(isset($zone_name)){
                        $zone = Zone::firstOrCreate(
                            ['name' => $zone_name, 'zoneable_id' => $airplane->id, 'zoneable_type' => 'App\Models\Aircraft']
                        );
                        array_push($zones, $zone->id);
                    }
                }
            }
            $taskcard->zones()->attach($zones);
        }

        // TODO: Polymorph values:
        // - Table: accesses
        $accesses = [];
        if($row['access']){
            foreach (explode(' ',$row['access']) as $access_name ) {
                foreach ($airplanes as $airplane) {
                    if(isset($access_name)){
                        $access = Access::firstOrCreate(
                            ['name' => $access_name, 'accessable_id' => $airplane->id, 'accessable_type' => 'App\Models\Aircraft']
                        );
                        array_push($accesses, $access->id);
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
        if($row['threshold']){
            foreach (explode(';',$row['threshold']) as $threshold ) {
                $e = explode('-',$threshold);
                $threshold_type = Type::ofMaintenanceCycle()->where('code', 'like', '%' . $e[1] . '%')->first()->id;
                $taskcard->thresholds()->save(new Threshold([
                    'amount' => $e[0],
                    'type_id' => $threshold_type,
                ]));
            }
        }
        // - Table: repeats
        if($row['repeat']){
            foreach (explode(';',$row['repeat']) as $threshold ) {
                $e = explode('-',$threshold);
                $threshold_type = Type::ofMaintenanceCycle()->where('code', 'like', '%' . $e[1] . '%')->first()->id;
                $taskcard->repeats()->save(new Repeat([
                    'amount' => $e[0],
                    'type_id' => $threshold_type,
                ]));
            }
        }

    }
}
