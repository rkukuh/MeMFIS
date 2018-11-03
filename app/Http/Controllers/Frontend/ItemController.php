<?php

namespace App\Http\Controllers\Frontend;

use Response;
use Spatie\Tags\Tag;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Journal;
use App\Models\ListUtil;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Frontend\ItemStore;
use App\Http\Requests\Frontend\ItemUpdate;

class ItemController extends Controller
{
    /**
     * Show data from model for DataTable.
     *
     * @return \Illuminate\Http\Response
     */
    public function getItems()
    {
        $items = Item::with('unit', 'journal')->get();

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
    public function index()
    {
        return view('frontend.item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStore $request)
    {
        return response()
                ->json(
                    Item::create([
                        'code' => $request->code,
                        'name' => $request->name,
                        'unit_id' => $request->unit,
                        'description' => $request->description,
                        'is_stock' => $request->is_stock,
                        'is_ppn' => $request->is_ppn,
                        'ppn_amount' => $request->ppn_amount,
                        'barcode' => $request->barcode,
                        'account_code' => optional(Journal::where('uuid', $request->account_code)->first())->id,
                    ])
                    ->categories()
                    ->attach($request->category)
                );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('frontend.item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        $tags = Tag::get();
        $categories = Category::ofItem()->get();
        $item = Item::with('unit')->where('uuid',$item)->first();

        try {
            $journal_id = $item->account_code;
            $journal =  Journal::find($journal_id);
            $tags = Tag::get();
            $tag_items = $item->tags;
            $units = Unit::ofQuantity()->get();

            // dd($units);
            $categories = Category::ofItem()->get();
            $category_items = $item->categories;
            $journal_name = $journal->code." - ".$journal->name;
            return view('frontend.item.edit',compact('item','categories','category_items','units','tags','tag_items'));
        } catch (\Exception $e) {
            $units = Unit::ofQuantity()->get();
            // dd($units."2");

            $tags = Tag::get();
            $tag_items = $item->tags;
            $categories = Category::ofItem()->get();
            $category_items = $item->categories;
            $journal_name = "Search the account code";
            return view('frontend.item.edit',compact('item','categories','category_items','journal_name','units','tags','tag_items'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemUpdate  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdate $request, Item $item)
    {
        $journal =  Journal::where('uuid',$request->accountcode)->first();
        if($journal == null){
            $item->code = $request->code;
            $item->name = $request->name;
            $item->unit_id = $request->unit;
            $item->description = $request->description;
            $item->barcode = $request->barcode;
            // $item->is_ppn = $request->is_ppn;
            // $item->is_stock = $request->is_stock;
            $item->ppn_amount = $request->ppn;
            $item->save();

            // $item = Item::create([
            //     'code' => $request->code,
            //     'name' => $request->name,
            //     'unit_id' => $request->unit,
            //     'unit_quantity'=>$request->quantity,
            //     'description' => $request->description,
            //     'barcode' => $request->barcode,
            //     'is_ppn' => $request->isppn,
            //     'is_stock' => $request->isstock,
            //     'ppn_amount' => $request->ppn,
            // ]);
        }else{
            $item->code = $request->code;
            $item->name = $request->name;
            $item->unit_id = $request->unit;
            $item->unit_quantity = $request->quantity;
            $item->description = $request->description;
            $item->barcode = $request->barcode;
            $item->account_code = $journal->id;
            // $item->is_ppn = $request->is_ppn;
            // $item->is_stock = $request->is_stock;
            $item->ppn_amount = $request->ppn;
            $item->save();
        }

        $item->categories()->detach();
        $item->categories()->attach($request->category);
        // $item->detachTags();
        $item->syncTags($request->selectedtags);

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json($item);
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
