<?php

namespace App\Http\Controllers\Datatables\TaskRelease;

use Carbon\Carbon;
use App\User;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\ListUtil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskReleaseJobCardDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobCards = JobCard::with('quotation','quotation.quotationable','quotation.quotationable.customer','quotation.quotationable.aircraft')->get();
        foreach($JobCards as $jobcard){
            if($jobcard->jobcardable_type == "App\Models\TaskCard"){
                $jobcard->tc_number    .= $jobcard->jobcardable->number;
                $jobcard->tc_title     .= $jobcard->jobcardable->title;
                if(isset($jobcard->jobcardable->task_id)){
                    $jobcard->task_name .= $jobcard->jobcardable->task->name;
                }
                $jobcard->type_name    .= $jobcard->jobcardable->type->name;
                $jobcard->skill        .= $jobcard->jobcardable->skill;
                if($jobcard->jobcardable->additionals <> null){
                    $addtional = json_decode($jobcard->jobcardable->additionals);
                    $jobcard->company_task .= $addtional->internal_number;
                }
                else{
                    $jobcard->company_task .= "-";
    
                }
            }else if($jobcard->jobcardable_type == "App\Models\EOInstruction"){
                $jobcard->tc_number    .= $jobcard->jobcardable->eo_header->number;
                $jobcard->tc_title     .= $jobcard->jobcardable->eo_header->title;
                $jobcard->task_name    .= "-";
                $jobcard->type_name    .= $jobcard->jobcardable->eo_header->type->name;
                $jobcard->skill        .= $jobcard->jobcardable->skill;
                if($jobcard->jobcardable->eo_header->additionals <> null){
                    $addtional = json_decode($jobcard->jobcardable->eo_header->additionals);
                    $jobcard->company_task .= $addtional->internal_number;
                }
                else{
                    $jobcard->company_task .= "-";
    
                }
            }

            $jobcard->skill_name .= $jobcard->jobcardable->skill;

            

            $count_user = $jobcard->progresses->groupby('progressed_by')->count()-1;

            $status = [];
            foreach($jobcard->progresses->groupby('progressed_by') as $key => $value){
                if(Status::ofJobCard()->where('id',$jobcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code == "pending"){
                    array_push($status, 'Pending');
                }
            }
            if($jobcard->is_rii == 1 and $jobcard->approvals->count()==2){
                $jobcard->status .= 'Released';
            }
            elseif(sizeof($jobcard->approvals)==1 and Status::ofJobCard()->where('id',$jobcard->progresses->last()->status_id)->first()->code == "released"){
                if($jobcard->progresses->where('status_id', Status::ofJobCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                    $jobcard->status .= 'Released';
                }
            }
            elseif($jobcard->progresses->where('status_id', Status::ofJobCard()->where('code','closed')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
                $jobcard->status .= 'Closed';
            }
            elseif(sizeof($status) == $count_user and $count_user <> 0){
                $jobcard->status .= 'Pending';
            }
            elseif(sizeof($status) <> $count_user and $count_user <> 0){
                $jobcard->status .= 'Progress';
            }
            elseif($jobcard->progresses->count()==1){
                $jobcard->status .= 'Open';
            }

            $jobcard->actual .= $jobcard->ActualManhour;

            //auditable, Technichal Writer request to show this
            if($jobcard->approvals->toArray() == []){
                $conducted_by = "";
                $conducted_at = "";

            }
            else{
                $conducted_by = User::find($jobcard->approvals->last()->conducted_by)->name;
                $conducted_at = $jobcard->approvals->last()->created_at;
            }

            $jobcard->conducted_by      .= $conducted_by;
            $jobcard->conducted_at      .= $conducted_at;

            $jobcard->create_date       .= $jobcard->audits->first()->created_at;
            $jobcard->created_by        .= User::find($jobcard->audits->first()->user_id)->name;

            $jobcard->update_date       .= $jobcard->audits->last()->updated_at;
            $jobcard->updated_by        .= User::find($jobcard->audits->last()->user_id)->name;

        }

        $data = $alldata = json_decode(collect(array_values($JobCards->whereIn('status',['Closed','Released'])->all())));

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
        $JobCards=JobCard::with('taskcard');

        if (!empty($request->task_type_id)) {
            $JobCards->whereHas('jobcardable', function ($query) use ($request) {
                $query->where('task_id', $request->task_type_id);
            });
        }
        if (!empty($request->applicability_airplane)) {
            $JobCards->whereHas('applicability_airplane', function ($query) use ($request) {
                $query->whereIn('id', $request->applicability_airplane);
            });
        }
        // if (!empty($request->otr_certification)) {
        //     $JobCards->whereHas('otr_certification', function ($query) use ($request) {
        //         $query->where('id', $request->otr_certification);
        //     });
        // }
        if (!empty($request->project_no)) {
            $JobCards->orderBy('project_no', $request->project_no);
        }
        // if (!empty($request->taskcard_routine_type)) {
        //     $JobCards->whereHas('taskcard_routine_type', function ($query) use ($request) {
        //     $query->where('task_id', $request->task_type_id);
        // });
        // }
        if (!empty($request->date_issued)) {
            $JobCards->orderBy('created_at', $request->date_issued);
        }
        if (!empty($request->jc_no)) {
            $JobCards->orderBy('number', $request->jc_no);
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

        $data = $alldata = json_decode($JobCards->get());

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
