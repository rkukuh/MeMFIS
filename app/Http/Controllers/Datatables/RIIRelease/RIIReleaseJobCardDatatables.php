<?php

namespace App\Http\Controllers\Datatables\RIIRelease;

use App\Models\JobCard;
use App\Models\ListUtil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RIIReleaseJobCardDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobCard =JobCard::with('taskcard','quotation')->whereHas('taskcard', function ($query) {
                                            $query->where('is_rii', '1');
                                            })->get();

        foreach($JobCard as $aircraft){
            $aircraft->aircraft_name .= $aircraft->quotation->project->aircraft->name;
        }

        foreach($JobCard as $taskcard){
            if(isset($taskcard->taskcard->skills) ){
                if(sizeof($taskcard->taskcard->skills) == 3){
                    $taskcard->skill_name .= "ERI";
                }
                else if(sizeof($taskcard->taskcard->skills) == 1){
                    $taskcard->skill_name .= $taskcard->taskcard->skills[0]->name;
                }
                else{
                    $taskcard->skill_name .= '';
                }
            }
        }

        foreach($JobCard as $customer){
            $customer->customer_name .= $customer->quotation->customer;
        }

        $data = $alldata = json_decode($JobCard);

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
