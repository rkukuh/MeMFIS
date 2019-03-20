<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\TaskCard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskCardsBoeingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        /** Set the workarea */

        switch ($row['task_type']) {
            case 'RESTORE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'INSPECTION - DETAILED':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Inspection')->first()->id;
            case 'INSPECTION - GEN VISUAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Inspection')->first()->id;
            case 'SERVICE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Service')->first()->id;
            case 'LUBRICATE':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Lubrication')->first()->id;
            case 'VISUAL CHECK':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Visual Check')->first()->id;
            case 'DISCARD':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'OPERATIONAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'FUNCTIONAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'GENERAL VISUAL':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'ZONAL (GV)':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'DETAILED':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            case 'SPECIAL DETAILED':
                $task_type = Type::ofTaskCardTask()
                                    ->where('name', 'Restore')->first()->id;
            break;
                default:
                $task_type = null;

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
            case 'CREW CABIN':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'MAIN EE CTR':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'FWD AIRSTAIR':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'FWD CARGO':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'FT CARGO':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'ENGINE #1':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'ENGINE #2':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'ENGINE #1':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'MULTIPLE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'L WING LE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'R WING LE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'TAIL CONE':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'LEFT CARGO':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'EMERG DOORS':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            case 'DOORS':
                $work_area = Type::ofWorkArea()
                                    ->where('name', 'AC DIST BAY')->first()->id;
                break;
            default:
                $work_area = null;

        }




        $taskcard =  new TaskCard([
            'number' => $row['number'],
            'title' => $row['title'],
            'type_id' => null, // TODO: Import appropriate value
            'task_id' => $task_type, // TODO: Import appropriate value
            'skill_id' => null, // TODO: Import appropriate value
            'work_area' => $work_area, // TODO: Import appropriate value
            'estimation_manhour' => $row['manhours'],
            'is_rii' => $row['is_rii'],
            'source' => $row['source'],
            'effectivity' => $row['effectivity'],
            'version' => json_encode($row['version']),
            'description' => $row['description'],
        ]);

        $taskcard->save();


        // TODO: M-M values:
        // - Table: aircraft_taskcard
        // - Table: taskcard_zone

        // TODO: Polymorph values:
        // - Table: accesses
        // - Table: thresholds
        // - Table: repeats
    }
}
