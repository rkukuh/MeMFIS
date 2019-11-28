<?php

namespace App\Http\Controllers\Datatables\PurchaseOrder;

use App\Models\PurchaseOrder;
use App\Models\Unit;
use App\Models\ListUtil;
use App\Models\Pivots\PurchaseOrderItem;
use Illuminate\Http\Order;
use App\Http\Controllers\Controller;

class ItemPurchaseOrderDatatables extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PurchaseOrder $purchaseOrder)
    {
        $items = PurchaseOrderItem::with('item','item.unit', 'item.categories')->where('purchase_order_id',$purchaseOrder->id)->whereHas('item', function ($query) {
            $query->whereHas('categories', function ($query2) {
                $query2->whereIn('code', ['raw', 'cons', 'comp']);
            });
        })->get();

        foreach($items as $purchaseOrder){
            $purchaseOrder->unit_name .= Unit::find($purchaseOrder->unit_id)->name;
            $discount = $purchaseOrder->where('item_id', $purchaseOrder->item_id)->first()->promos->first();
            if($discount){
                $purchaseOrder->discount_amount = $discount->pivot->amount;
                $purchaseOrder->discount_percentage = $discount->pivot->value."%";
            }
        }

        $data = $alldata = json_decode($items);

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
    public function purchaseOrderModal()
    {
        {
            function filterArray( $array, $allowed = [] ) {
                return array_filter(
                    $array,
                    function ( $val, $key ) use ( $allowed ) { // N.b. $val, $key not $key, $val
                        return isset( $allowed[ $key ] ) && ( $allowed[ $key ] === true || $allowed[ $key ] === $val );
                    },
                    ARRAY_FILTER_USE_BOTH
                );
            }

            function filterKeyword( $data, $search, $field = '' ) {
                $filter = '';
                if ( isset( $search['value'] ) ) {
                    $filter = $search['value'];
                }
                if ( ! empty( $filter ) ) {
                    if ( ! empty( $field ) ) {
                        if ( strpos( strtolower( $field ), 'date' ) !== false ) {
                            // filter by date range
                            $data = filterByDateRange( $data, $filter, $field );
                        } else {
                            // filter by column
                            $data = array_filter( $data, function ( $a ) use ( $field, $filter ) {
                                return (boolean) preg_match( "/$filter/i", $a[ $field ] );
                            } );
                        }

                    } else {
                        // general filter
                        $data = array_filter( $data, function ( $a ) use ( $filter ) {
                            return (boolean) preg_grep( "/$filter/i", (array) $a );
                        } );
                    }
                }

                return $data;
            }

            function filterByDateRange( $data, $filter, $field ) {
                // filter by range
                if ( ! empty( $range = array_filter( explode( '|', $filter ) ) ) ) {
                    $filter = $range;
                }

                if ( is_array( $filter ) ) {
                    foreach ( $filter as &$date ) {
                        // hardcoded date format
                        $date = date_create_from_format( 'm/d/Y', stripcslashes( $date ) );
                    }
                    // filter by date range
                    $data = array_filter( $data, function ( $a ) use ( $field, $filter ) {
                        // hardcoded date format
                        $current = date_create_from_format( 'm/d/Y', $a[ $field ] );
                        $from    = $filter[0];
                        $to      = $filter[1];
                        if ( $from <= $current && $to >= $current ) {
                            return true;
                        }

                        return false;
                    } );
                }

                return $data;
            }

            $columnsDefault = [
                'uuid'     => true,
                'ordered_at'     => true,
                'number'     => true,
                'purchase_request'     => true,
                'vendor'     => true,
                'Actions'      => true,
                ];

            if ( isset( $_REQUEST['columnsDef'] ) && is_array( $_REQUEST['columnsDef'] ) ) {
                $columnsDefault = [];
                foreach ( $_REQUEST['columnsDef'] as $field ) {
                    $columnsDefault[ $field ] = true;
                }
            }

            // get all raw data
            $purchase_request = PurchaseOrder::with('purchase_request','vendor')->get();

            $alldata = json_decode( $purchase_request, true);

            $data = [];
            // internal use; filter selected columns only from raw data
            foreach ( $alldata as $d ) {
                $data[] = filterArray( $d, $columnsDefault );
            }

            // count data
            $totalRecords = $totalDisplay = count( $data );

            // filter by general search keyword
            if ( isset( $_REQUEST['search'] ) ) {
                $data         = filterKeyword( $data, $_REQUEST['search'] );
                $totalDisplay = count( $data );
            }

            if ( isset( $_REQUEST['columns'] ) && is_array( $_REQUEST['columns'] ) ) {
                foreach ( $_REQUEST['columns'] as $column ) {
                    if ( isset( $column['search'] ) ) {
                        $data         = filterKeyword( $data, $column['search'], $column['data'] );
                        $totalDisplay = count( $data );
                    }
                }
            }

            // sort
            if ( isset( $_REQUEST['order'][0]['column'] ) && $_REQUEST['order'][0]['dir'] ) {
                $column = $_REQUEST['order'][0]['column'];
                $dir    = $_REQUEST['order'][0]['dir'];
                usort( $data, function ( $a, $b ) use ( $column, $dir ) {
                    $a = array_slice( $a, $column, 1 );
                    $b = array_slice( $b, $column, 1 );
                    $a = array_pop( $a );
                    $b = array_pop( $b );

                    if ( $dir === 'asc' ) {
                        return $a > $b ? true : false;
                    }

                    return $a < $b ? true : false;
                } );
            }

            // pagination length
            if ( isset( $_REQUEST['length'] ) ) {
                $data = array_splice( $data, $_REQUEST['start'], $_REQUEST['length'] );
            }

            // return array values only without the keys
            if ( isset( $_REQUEST['array_values'] ) && $_REQUEST['array_values'] ) {
                $tmp  = $data;
                $data = [];
                foreach ( $tmp as $d ) {
                    $data[] = array_values( $d );
                }
            }

            $secho = 0;
            if ( isset( $_REQUEST['sEcho'] ) ) {
                $secho = intval( $_REQUEST['sEcho'] );
            }

            $result = [
                'iTotalRecords'        => $totalRecords,
                'iTotalDisplayRecords' => $totalDisplay,
                'sEcho'                => $secho,
                'sColumns'             => '',
                'aaData'               => $data,
            ];

            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

            echo json_encode( $result, JSON_PRETTY_PRINT );
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemModal(PurchaseOrder $purchaseOrder)
    {
        {
            function filterArray( $array, $allowed = [] ) {
                return array_filter(
                    $array,
                    function ( $val, $key ) use ( $allowed ) { // N.b. $val, $key not $key, $val
                        return isset( $allowed[ $key ] ) && ( $allowed[ $key ] === true || $allowed[ $key ] === $val );
                    },
                    ARRAY_FILTER_USE_BOTH
                );
            }

            function filterKeyword( $data, $search, $field = '' ) {
                $filter = '';
                if ( isset( $search['value'] ) ) {
                    $filter = $search['value'];
                }
                if ( ! empty( $filter ) ) {
                    if ( ! empty( $field ) ) {
                        if ( strpos( strtolower( $field ), 'date' ) !== false ) {
                            // filter by date range
                            $data = filterByDateRange( $data, $filter, $field );
                        } else {
                            // filter by column
                            $data = array_filter( $data, function ( $a ) use ( $field, $filter ) {
                                return (boolean) preg_match( "/$filter/i", $a[ $field ] );
                            } );
                        }

                    } else {
                        // general filter
                        $data = array_filter( $data, function ( $a ) use ( $filter ) {
                            return (boolean) preg_grep( "/$filter/i", (array) $a );
                        } );
                    }
                }

                return $data;
            }

            function filterByDateRange( $data, $filter, $field ) {
                // filter by range
                if ( ! empty( $range = array_filter( explode( '|', $filter ) ) ) ) {
                    $filter = $range;
                }

                if ( is_array( $filter ) ) {
                    foreach ( $filter as &$date ) {
                        // hardcoded date format
                        $date = date_create_from_format( 'm/d/Y', stripcslashes( $date ) );
                    }
                    // filter by date range
                    $data = array_filter( $data, function ( $a ) use ( $field, $filter ) {
                        // hardcoded date format
                        $current = date_create_from_format( 'm/d/Y', $a[ $field ] );
                        $from    = $filter[0];
                        $to      = $filter[1];
                        if ( $from <= $current && $to >= $current ) {
                            return true;
                        }

                        return false;
                    } );
                }

                return $data;
            }

            $columnsDefault = [
                'code'     => true,
                'name'     => true,
                'description'    => true,
                'uuid'     => true,
                'Actions'      => true,
                    ];

            if ( isset( $_REQUEST['columnsDef'] ) && is_array( $_REQUEST['columnsDef'] ) ) {
                $columnsDefault = [];
                foreach ( $_REQUEST['columnsDef'] as $field ) {
                    $columnsDefault[ $field ] = true;
                }
            }

            // get all raw data
            $purchase_requests = PurchaseOrderItem::with('item')->where('purchase_order_id',$purchaseOrder->id)->get();
            foreach ($purchase_requests as $purchase_request){

                $purchase_request->code .= $purchase_request->item->code;
                $purchase_request->name .= $purchase_request->item->name;
                $purchase_request->description .= $purchase_request->item->description;
                $purchase_request->uuid .= $purchase_request->item->uuid;
            }

            $alldata = json_decode( $purchase_requests, true);

            $data = [];
            // internal use; filter selected columns only from raw data
            foreach ( $alldata as $d ) {
                $data[] = filterArray( $d, $columnsDefault );
            }

            // count data
            $totalRecords = $totalDisplay = count( $data );

            // filter by general search keyword
            if ( isset( $_REQUEST['search'] ) ) {
                $data         = filterKeyword( $data, $_REQUEST['search'] );
                $totalDisplay = count( $data );
            }

            if ( isset( $_REQUEST['columns'] ) && is_array( $_REQUEST['columns'] ) ) {
                foreach ( $_REQUEST['columns'] as $column ) {
                    if ( isset( $column['search'] ) ) {
                        $data         = filterKeyword( $data, $column['search'], $column['data'] );
                        $totalDisplay = count( $data );
                    }
                }
            }

            // sort
            if ( isset( $_REQUEST['order'][0]['column'] ) && $_REQUEST['order'][0]['dir'] ) {
                $column = $_REQUEST['order'][0]['column'];
                $dir    = $_REQUEST['order'][0]['dir'];
                usort( $data, function ( $a, $b ) use ( $column, $dir ) {
                    $a = array_slice( $a, $column, 1 );
                    $b = array_slice( $b, $column, 1 );
                    $a = array_pop( $a );
                    $b = array_pop( $b );

                    if ( $dir === 'asc' ) {
                        return $a > $b ? true : false;
                    }

                    return $a < $b ? true : false;
                } );
            }

            // pagination length
            if ( isset( $_REQUEST['length'] ) ) {
                $data = array_splice( $data, $_REQUEST['start'], $_REQUEST['length'] );
            }

            // return array values only without the keys
            if ( isset( $_REQUEST['array_values'] ) && $_REQUEST['array_values'] ) {
                $tmp  = $data;
                $data = [];
                foreach ( $tmp as $d ) {
                    $data[] = array_values( $d );
                }
            }

            $secho = 0;
            if ( isset( $_REQUEST['sEcho'] ) ) {
                $secho = intval( $_REQUEST['sEcho'] );
            }

            $result = [
                'iTotalRecords'        => $totalRecords,
                'iTotalDisplayRecords' => $totalDisplay,
                'sEcho'                => $secho,
                'sColumns'             => '',
                'aaData'               => $data,
            ];

            header('Content-Type: application/json');
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

            echo json_encode( $result, JSON_PRETTY_PRINT );
        }
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
