<?php

namespace App\Http\Controllers\Datatables\Quotation;

use App\Models\Unit;
use App\Models\Item;
use App\Models\HtCrr;
use App\Models\Project;
use App\Models\TaskCard;
use App\Models\ListUtil;
use App\Models\Quotation;
use App\Models\DefectCard;
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Models\QuotationHtcrrItem;
use App\Http\Controllers\Controller;
use App\Models\QuotationDefectCardItem;
use App\Models\QuotationWorkPackageTaskCardItem;
use stdClass;

class QuotationAdditionalDatatables extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobRequest(Quotation $quotation)
    {
        $workpackages = []; $json_data = json_decode($quotation->data_defectcard);

        $total_item_price = QuotationDefectCardItem::with('defectcard.jobcard','defectcard.jobcard.taskcard','item','unit','price')->where('quotation_id', $quotation->id)
        ->sum('subtotal');
    
        // dd($json_data->total_manhour);
        $workpackage = new stdClass();
        $workpackage->code = $quotation->title;
        $workpackage->description =  $quotation->title;
        $workpackage->mat_tool_price = $total_item_price;
        if(isset($json_data)){
            if(isset($json_data->discount_type)){
                $workpackage->discount_type = $json_data->discount_type;
                $workpackage->discount_value = $json_data->discount_value;
            }else{
                $workpackage->discount_type = null;
                $workpackage->discount_value = null;
            }

            $workpackage->total_manhours_with_performance_factor = $json_data->total_manhour;
            $workpackage->manhour_rate_amount = $json_data->manhour_rate;
        }else{
            $workpackage->discount_type = null;
            $workpackage->discount_value = null;
            $workpackage->manhour_rate_amount = 0;
            $workpackage->total_manhours_with_performance_factor = 0;
        }

        array_push($workpackages, $workpackage);

        $data = $alldata = $workpackages;

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
}
