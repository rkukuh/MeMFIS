<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Models\Item;
use App\Models\ListUtil;
use App\Models\Pivots\ItemStorage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemStorageStore;
use App\Http\Requests\Frontend\ItemStorageUpdate;

class ItemStorageController extends Controller
{
        /**
     * Show data from model for DataTable.
     *
     * @return \Illuminate\Http\Response
     */
    public function getItemStorages($code)
    {
        $item = Item::where('code',$code)->first();

        $itemStorages = $item->storages;

        $itemStorages = DB::table('items')
        ->join('item_storage', 'item_storage.item_id', '=', 'items.id')
        ->join('storages', 'storages.id', '=', 'item_storage.storage_id')
        ->select('storages.name', 'item_storage.max', 'item_storage.min' , 'item_storage.id')
        ->get();

        // dd($itemUnits);
        $data = $alldata = json_decode($itemStorages);

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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemStorageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStorageStore $request)
    {
        $item = Item::where('code',$request->code)->first();

        $item->storages()->attach([$request->storage => ['min' => $request->min, 'max' => $request->max]]);

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function show(ItemStorage $itemStorage)
    {
        return response()->json($itemStorage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemStorage $itemStorage)
    {
        return response()->json($itemStorage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemStorageUpdate  $request
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function update(ItemStorageUpdate $request, ItemStorage $itemStorage)
    {
        $itemStorage = ItemStorage::find($itemStorage);
        // $Item->name = $request->name;
        $itemStorage->save();

        return response()->json($itemStorage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemStorage  $itemStorage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemStorage $itemStorage)
    {
        $itemStorage->delete();

        return response()->json($itemStorage);
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
