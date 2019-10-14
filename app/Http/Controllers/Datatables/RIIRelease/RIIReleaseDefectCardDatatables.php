<?php

namespace App\Http\Controllers\Datatables\RIIRelease;

use App\User;
use App\Models\JobCard;
use App\Models\Status;
use App\Models\ListUtil;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RIIReleaseDefectCardDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $DefectCard =DefectCard::with('jobcard','jobcard.quotation','jobcard.taskcard')->whereHas('jobcard.taskcard', function ($query) {
        //                                     $query->where('is_rii', '1');
        //                                     })->get();
        // foreach($DefectCard as $aircraft){
        //     $aircraft->aircraft_name .= $aircraft->jobcard->quotation->quotationable->aircraft->name;
        // }

        // foreach($JobCard as $taskcard){
        //     if(isset($taskcard->taskcard->skills) ){
        //         if(sizeof($taskcard->taskcard->skills) == 3){
        //             $taskcard->skill_name .= "ERI";
        //         }
        //         else if(sizeof($taskcard->taskcard->skills) == 1){
        //             $taskcard->skill_name .= $taskcard->taskcard->skills[0]->name;
        //         }
        //         else{
        //             $taskcard->skill_name .= '';
        //         }
        //     }
        // }

        // foreach($JobCard as $customer){
        //     $customer->customer_name .= $customer->quotation->customer;
        // }

        // $data = $alldata = json_decode($JobCard);
        $DefectCard =DefectCard::with('jobcard','jobcard.quotation','jobcard.jobcardable','progresses')
                                            ->where('is_rii', '1')
                                            ->whereHas('progresses', function ($query) {
                                            $query->where('status_id', Status::where('code','released')->where('of','defectcard')->first()->id);
                                            })
                                            ->get();

        foreach($DefectCard as $defectcard){
            $defectcard->aircraft_name .= $defectcard->jobcard->quotation->quotationable->aircraft->name;

            $defectcard->customer_name .= $defectcard->jobcard->quotation->quotationable->customer->name;

            if(isset($defectcard->jobcard->jobcardable->skills) ){
                $defectcard->jobcard->skill_name .= $defectcard->skill;
            }
            $count_user = $defectcard->progresses->groupby('progressed_by')->count();

            $status = [];
            foreach($defectcard->progresses->groupby('progressed_by') as $key => $value){
                if(Status::ofDefectCard()->where('id',$defectcard->progresses->where('progressed_by',$key)->last()->status_id)->first()->code == "pending"){
                    array_push($status, 'Pending');
                }
            }

            if($defectcard->is_rii == 1 and $defectcard->approvals->count()==4){
                $defectcard->status .= 'Released';
            }
            elseif($defectcard->is_rii == 1 and $defectcard->approvals->count()==3){
                    $defectcard->status .= 'Waiting for RII';
            }
            elseif($defectcard->is_rii == 0 and sizeof($defectcard->approvals)==3){
                if($defectcard->progresses->where('status_id', Status::ofDefectCard()->where('code','released')->first()->id)->groupby('progressed_by')->count() == $count_user and $count_user <> 0){
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

            //auditable, Technichal Writer request to show this
            if($defectcard->approvals->toArray() == []){
                $conducted_by = "";
                $conducted_at = "";

            }
            else{
                $conducted_by = User::find($defectcard->approvals->last()->conducted_by)->name;
                $conducted_at = $defectcard->approvals->last()->created_at;
            }

            $defectcard->conducted_by      .= $conducted_by;
            $defectcard->conducted_at      .= $conducted_at;

            $defectcard->create_date       .= $defectcard->audits->first()->created_at;
            $defectcard->created_by        .= User::find($defectcard->audits->first()->user_id)->name;

            $defectcard->update_date       .= $defectcard->audits->last()->updated_at;
            $defectcard->updated_by        .= User::find($defectcard->audits->last()->user_id)->name;
        }

        $data = $alldata = json_decode(collect(array_values($DefectCard->whereIn('status',['Released','Waiting for RII','RII Released'])->all())));

        // $data = $alldata = json_decode($DefectCard);

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
