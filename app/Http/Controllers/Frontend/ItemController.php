<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Journal;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemStore;
use App\Http\Requests\Frontend\ItemUpdate;

class ItemController extends Controller
{
    protected $tags;
    protected $units;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::getWithType('item');
        $this->units = Unit::ofQuantity()->get();
        $this->categories = Category::ofItem()->get();
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
        $item = Item::create([
                    'code' => $request->code,
                    'name' => $request->name,
                    'unit_id' => $request->unit,
                    'description' => $request->description,
                    'is_stock' => $request->is_stock,
                    'is_ppn' => $request->is_ppn,
                    'ppn_amount' => $request->ppn_amount,
                    'barcode' => $request->barcode,
                    'account_code' => optional(Journal::where('uuid', $request->account_code)->first())->id,
                ]);

        $item->categories()->attach($request->category);

        return response()->json($item);
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
    public function edit(Item $item)
    {
        return view('frontend.item.edit', [
            'item' => $item,
            'tags' => $this->tags,
            'units' => $this->units,
            'categories' => $this->categories,
        ]);
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
        $journal =  Journal::where('uuid',$request->account_code)->first();
        if($journal == null){
            $item->code = $request->code;
            $item->name = $request->name;
            $item->unit_id = $request->unit;
            $item->description = $request->description;
            $item->barcode = $request->barcode;
            $item->is_ppn = $request->is_ppn;
            $item->is_stock = $request->is_stock;
            $item->ppn_amount = $request->ppn_amount;
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
            $item->description = $request->description;
            $item->barcode = $request->barcode;
            $item->account_code = $journal->id;
            $item->is_ppn = $request->is_ppn;
            $item->is_stock = $request->is_stock;
            $item->ppn_amount = $request->ppn_amount;
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
}
