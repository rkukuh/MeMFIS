<?php

namespace App\Http\Controllers\Datatables\Quotation;

use App\Models\Unit;
use App\Models\Item;
use App\Models\HtCrr;
use App\Models\Project;
use App\Models\TaskCard;
use App\Models\ListUtil;
use App\Models\Quotation;
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Models\QuotationHtcrrItem;
use App\Http\Controllers\Controller;
use App\Models\QuotationWorkPackageTaskCardItem;

class QuotationToolDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function routine(Quotation $quotation, WorkPackage $workPackage)
    {
        $routinetools = QuotationWorkPackageTaskCardItem::with('taskcard','item','unit','price')->where('quotation_id', $quotation->id)
                ->where('workpackage_id', $workPackage->id)
                ->whereHas('taskcard', function ($query) {
                        $query->wherehas('type', function ($query2) {
                            $query2->where('of','taskcard-type-routine');
                        });
                })
                ->whereHas('item', function ($query) {
                        $query->whereHas('categories', function ($query) {
                            $query->where('code','tool');
                        });
                })
                ->get();

        foreach($routinetools as $routinetool){
            if($routinetool->item->prices->last() <> null){
                $routinetool->unitPrice .= $routinetool->item->prices->where('level',$quotation->project->customer->levels->last()->id)->last()->amount;
            }
            else{
                $routinetool->unitPrice .= 0;
            }

        }

        $data = $alldata = json_decode($routinetools);

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
    public function non_routine(Quotation $quotation, WorkPackage $workPackage)
    {
        $nonroutinetools = QuotationWorkPackageTaskCardItem::with('taskcard','item','unit','price')->where('quotation_id', $quotation->id)
        ->where('workpackage_id', $workPackage->id)
        ->whereHas('taskcard', function ($query) {
                $query->wherehas('type', function ($query2) {
                    $query2->where('of','taskcard-type-non-routine');
                });
        })
        ->whereHas('item', function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('code','tool');
                });
        })
        ->get();

        foreach($nonroutinetools as $nonroutinetool){
            if($nonroutinetool->item->prices->last() <> null){
                $nonroutinetool->unitPrice .= $nonroutinetool->item->prices->where('level',$quotation->project->customer->levels->last()->id)->last()->amount;
            }
            else{
                $nonroutinetool->unitPrice .= 0;
            }

        }

        $data = $alldata = json_decode($nonroutinetools);

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
    public function htcrr(Quotation $quotation, WorkPackage $workPackage)
    {
        $htcrrtools = $tools = [];
        $project = Project::find($quotation->project_id);
        $project_htcrr = $project->htcrr;
        // -Get Items from htcrr
        foreach($project_htcrr as $htcrr){
            foreach($htcrr->tools as $tool){
                array_push($tools, $tool);

            }
        }

        foreach($tools as $tool){
            $items = QuotationHtcrrItem::where('htcrr_id', $tool->pivot->pivotParent->id)
            ->where('quotation_id', $quotation->id)
            ->where('item_id', $tool->id)
            ->get();
            if(sizeof($items) > 0){
                foreach($items as $item){
                    array_push($htcrrtools, $item);
                }
            }
        }

        foreach($htcrrtools as $htcrrtool){
            $htcrrtool->tc .= QuotationHtcrrItem::find($htcrrtool->htcrr_id)->code;
            $htcrrtool->pn .= Item::find($htcrrtool->item_id)->code;
            $htcrrtool->title .= Item::find($htcrrtool->item_id)->name;
            $htcrrtool->unit_tool .= $htcrrtool->unit->name;
            $htcrrtool->unitPrice .= null;
        }

        $data = $alldata = $htcrrtools;

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
