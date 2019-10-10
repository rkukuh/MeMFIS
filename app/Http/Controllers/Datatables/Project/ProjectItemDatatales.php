<?php

namespace App\Http\Controllers\Datatables\Project;

use App\Models\Project;
use App\Models\TaskCard;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ListUtil;
use App\Http\Controllers\Controller;
use App\Models\WorkPackage;

class ProjectItemDatatales extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function material(Project $project, WorkPackage $workPackage, $type)
    {
        //todo kalau bisa hanya perlu menggunakan query, agar berjalan lebih cepat dari pada menggunakan beberapa kali query dan foreach

        $taskcards = $taskcard_ids = $materials = [];

        $taskcards = ProjectWorkPackage::where('project_id', $project->id)
        ->where('workpackage_id', $workPackage->id)
        ->first();

        $result = $taskcards->taskcards->map(function ($taskcard) {
            return collect($taskcard->toArray())
            ->only(['taskcard_id'])
            ->all();
        });

        foreach($result as $tc){
            array_push($taskcard_ids, $tc["taskcard_id"]);
        }

        $taskcards = TaskCard::whereIn('id', $taskcard_ids)->with('type','items','items.unit')
        ->whereHas('items')
        ->whereHas('type', function ($query) use ($type) {
            $query->where('name', $type);
        })->get();
        
        foreach($taskcards as $taskcard){
            foreach($taskcard->materials as $material){
                $material->tackcard_number = $taskcard->number;
                array_push($materials, $material);
            }
        }
        
        $data = $alldata = $materials;

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
    public function tool(Project $project, WorkPackage $workPackage, $type)
    {
        //todo kalau bisa hanya perlu menggunakan query, agar berjalan lebih cepat dari pada menggunakan beberapa kali query dan foreach
        // $tools = ProjectWorkPackage::with('taskcards','taskcards.taskcard','taskcards.taskcard.type','taskcards.taskcard.items')
        // ->where('project_id', $project->id)
        // ->where('workpackage_id', $workPackage->id)
        // ->whereHas('taskcards.taskcard.type', function ($query) use ($type) {
        //     $query->where('name', $type);
        // })
        // ->whereHas('taskcards.taskcard.items', function ($query) {
        //         $query->whereHas('categories', function ($query2) {
        //             $query2->where('code', 'tool');
        //         });
        // })
        // ->first();

        $taskcards = $taskcard_ids = $tools = [];

        $taskcards = ProjectWorkPackage::where('project_id', $project->id)
        ->where('workpackage_id', $workPackage->id)
        ->first();

        $result = $taskcards->taskcards->map(function ($taskcard) {
            return collect($taskcard->toArray())
            ->only(['taskcard_id'])
            ->all();
        });

        foreach($result as $tc){
            array_push($taskcard_ids, $tc["taskcard_id"]);
        }

        $taskcards = TaskCard::whereIn('id', $taskcard_ids)->with('type','items','items.unit')
        ->whereHas('items')
        ->whereHas('type', function ($query) use ($type) {
            $query->where('name', $type);
        })->get();
        
        foreach($taskcards as $taskcard){
            foreach($taskcard->tools as $material){
                $material->tackcard_number = $taskcard->number;
                array_push($tools, $material);
            }
        }
        
        $data = $alldata = $tools;

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
