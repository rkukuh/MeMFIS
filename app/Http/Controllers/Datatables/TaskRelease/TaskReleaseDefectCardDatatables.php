<?php

namespace App\Http\Controllers\Datatables\TaskRelease;

use App\Models\Status;
use App\Models\JobCard;
use App\Models\ListUtil;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskReleaseDefectCardDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DefectCard = DefectCard::with('jobcard','jobcard.quotation')->get();

        foreach($DefectCard as $defectcard){

            $defectcard->jobcard->aircraft_name .= $defectcard->jobcard->quotation->quotationable->aircraft->name;
            if(isset($defectcard->jobcard->taskcard->skills) ){
                if(sizeof($defectcard->jobcard->taskcard->skills) == 3){
                    $defectcard->skill_name .= "ERI";
                }
                else if(sizeof($defectcard->jobcard->taskcard->skills) == 1){
                    $defectcard->skill_name .= $defectcard->jobcard->taskcard->skills[0]->name;
                }
                else{
                    $defectcard->skill_name .= '';
                }
            }

            $defectcard->customer_name .= $defectcard->jobcard->quotation->quotationable->customer->name;
            if($defectcard->jobcard->taskcard->additionals <> null){
                $addtional = json_decode($defectcard->jobcard->taskcard->additionals);
                $defectcard->jobcard->company_task .= $addtional->internal_number;
            }
            else{
                $defectcard->jobcard->company_task .= "";

            }

            $count_user = $defectcard->progresses->groupby('progressed_by')->count();

            // dd($count_user);
            $status = [];
            foreach($defectcard->progresses->groupby('progressed_by') as $key => $value){
                if(Status::ofDefectCard()->where('id',$defectcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code == "pending"){
                    array_push($status, 'Pending');
                }
            }

            if($defectcard->is_rii == 1 and $defectcard->approvals->count()==4){
                $defectcard->status .= 'Released';
            }
            elseif($defectcard->is_rii == 1 and $defectcard->approvals->count()==3 and $defectcard->progresses->where('status_id', Status::ofDefectCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() <> $count_user){
                    $defectcard->status .= 'Waiting for RII';
            }
            elseif($defectcard->is_rii == 0 and sizeof($defectcard->approvals)==3){
                if($defectcard->progresses->where('status_id', Status::ofDefectCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                    $defectcard->status .= 'Released';
                }
            }
            elseif($defectcard->progresses->where('status_id', Status::ofDefectCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                $defectcard->status .= 'Closed';
            }
            elseif(sizeof($status) == $count_user and $count_user <> 0){
                $defectcard->status .= 'Pending';
            }
            elseif(sizeof($status) <> $count_user and $count_user <> 0){
                $defectcard->status .= 'Progress';
            }
            elseif($defectcard->progresses->count()==1){
                $defectcard->status .= 'Open';
            }
            elseif($defectcard->approvals->count()==2){
                $defectcard->status .= 'PPC Approved';
            }
            elseif($defectcard->approvals->count()==1){
                $defectcard->status .= 'Engineer Approved';
            }

            // $statuses = Status::ofJobCard()->get();
            // foreach($jobcard->helpers as $helper){
            //     $helper->userID .= $helper->user->id;
            // }
            // $manhours = 0;
            // foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            //     $date1 = null;
            //     foreach($values as $value){
            //         if($statuses->where('id',$value->status_id)->first()->code <> "open" or $statuses->where('id',$value->status_id)->first()->code <> "released" or $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
            //             if($jobcard->helpers->where('userID',$key)->first() == null){
            //                 if($date1 <> null){
            //                     $t1 = Carbon::parse($date1);
            //                     $t2 = Carbon::parse($value->created_at);
            //                     $diff = $t1->diffInSeconds($t2);
            //                     $manhours = $manhours + $diff;
            //                 }
            //                 $date1 = $value->created_at;
            //             }
            //         }

            //     }
            // }
            // $manhours = $manhours/3600;
            // $manhours_break = 0;
            // foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            //     for($i=0; $i<sizeOf($values->toArray()); $i++){
            //         if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
            //             if($jobcard->helpers->where('userID',$key)->first() == null){
            //                 if($date1 <> null){
            //                     if($i+1 < sizeOf($values->toArray())){
            //                         $t2 = Carbon::parse($values[$i]->created_at);
            //                         $t3 = Carbon::parse($values[$i+1]->created_at);
            //                         $diff = $t2->diffInSeconds($t3);
            //                         $manhours_break = $manhours_break + $diff;
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }
            // $manhours_break = $manhours_break/3600;
            // $actual_manhours =number_format($manhours-$manhours_break, 2);
            // $jobcard->actual .= $actual_manhours;
        }

        // $data = $alldata = json_decode(collect(array_values($DefectCard->all())));
        $data = $alldata = json_decode(collect(array_values($DefectCard->whereIn('status',['Closed','Released','RII Released'])->all())));

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
                    ? $datatable['query']['generalSearch'] : '';

        if (! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });

            unset($datatable['query']['generalSearch']);
        }

        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;

        if (is_array($query)) {
            $query = array_filter($query);

            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }

        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';

        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data);

        usort($data, function ($a, $b) use ($sort, $field) {
            if (! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }

            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }

            return $a->$field < $b->$field ? true : false;
        });

        if ($perpage > 0) {
            $pages  = ceil($total / $perpage);
            $page   = max($page, 1);
            $page   = min($page, $pages);
            $offset = ($page - 1) * $perpage;

            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];

        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $JobCard=JobCard::with('taskcard');

        if (!empty($request->task_type_id)) {
            $JobCard->whereHas('taskcard', function ($query) use ($request) {
                $query->where('task_id', $request->task_type_id);
            });
        }
        if (!empty($request->applicability_airplane)) {
            $JobCard->whereHas('applicability_airplane', function ($query) use ($request) {
                $query->whereIn('id', $request->applicability_airplane);
            });
        }
        // if (!empty($request->otr_certification)) {
        //     $JobCard->whereHas('otr_certification', function ($query) use ($request) {
        //         $query->where('id', $request->otr_certification);
        //     });
        // }
        if (!empty($request->project_no)) {
            $JobCard->orderBy('project_no', $request->project_no);
        }
        // if (!empty($request->taskcard_routine_type)) {
        //     $JobCard->whereHas('taskcard_routine_type', function ($query) use ($request) {
        //     $query->where('task_id', $request->task_type_id);
        // });
        // }
        if (!empty($request->date_issued)) {
            $JobCard->orderBy('created_at', $request->date_issued);
        }
        if (!empty($request->jc_no)) {
            $JobCard->orderBy('number', $request->jc_no);
        }
        if (!empty($request->customer)) {
            $request->whereHas('otr_certification', function ($query) use ($request) {
                $query->where('id', $request->otr_certification);
            });
        }
        // if (!empty($request->status_jobcard)) {
        //      $request->whereHas('statuses', function ($query) use ($request) {
        //     $query->where('id', $request->status_jobcard);
        // });
        // }

        $data = $alldata = json_decode($JobCard->get());

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
                    ? $datatable['query']['generalSearch'] : '';

        if (! empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean)preg_grep("/$filter/i", (array)$a);
            });

            unset($datatable['query']['generalSearch']);
        }

        $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;

        if (is_array($query)) {
            $query = array_filter($query);

            foreach ($query as $key => $val) {
                $data = $this->list_filter($data, [$key => $val]);
            }
        }

        $sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
        $field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'RecordID';

        $meta    = [];
        $page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
        $perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

        $pages = 1;
        $total = count($data);

        usort($data, function ($a, $b) use ($sort, $field) {
            if (! isset($a->$field) || ! isset($b->$field)) {
                return false;
            }

            if ($sort === 'asc') {
                return $a->$field > $b->$field ? true : false;
            }

            return $a->$field < $b->$field ? true : false;
        });

        if ($perpage > 0) {
            $pages  = ceil($total / $perpage);
            $page   = max($page, 1);
            $page   = min($page, $pages);
            $offset = ($page - 1) * $perpage;

            if ($offset < 0) {
                $offset = 0;
            }

            $data = array_slice($data, $offset, $perpage, true);
        }

        $meta = [
            'page'    => $page,
            'pages'   => $pages,
            'perpage' => $perpage,
            'total'   => $total,
        ];

        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        $result = [
            'meta' => $meta + [
                    'sort'  => $sort,
                    'field' => $field,
                ],
            'data' => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * Show data from model with flter on datatable.
     *
     * @param $list, $args, $operator
     * @return \Illuminate\Http\Response
     */
    public function list_filter($list, $args = array(), $operator = 'AND')
    {
        if (! is_array($list)) {
            return array();
        }

        $util = new ListUtil($list);

        return $util->filter($args, $operator);
    }
}
