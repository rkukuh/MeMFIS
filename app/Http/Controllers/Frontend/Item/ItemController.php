<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Models\Item;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemStore;
use App\Http\Requests\Frontend\ItemUpdate;

class ItemController extends Controller
{
    protected $tags;
    protected $units;
    protected $categories;
    protected $manufacturers;

    public function __construct()
    {
        $this->tags = Tag::getWithType('item');
        $this->units = Unit::ofQuantity()->get();
        $this->manufacturers = Manufacturer::all();
        $this->categories = Category::ofItem()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.item.material.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.item.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStore $request)
    {
        if ($item = Item::create($request->all())) {
            $item->categories()->attach($request->category);
            $item->tags()->sync($request->selectedtags);

            return response()->json($item);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('frontend.item.material.show', [
            'item' => $item,
            'units' => $this->units,
            'categories' => $this->categories,
            'manufacturers' => $this->manufacturers,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $tags = array();
        foreach($item->tags as $i => $item_tag){
            $tags[$i] =  $item_tag->name;
        }

        return view('frontend.item.material.edit', [
            'item' => $item,
            'item_tags' => $tags,
            'tags' => $this->tags,
            'units' => $this->units,
            'categories' => $this->categories,
            'manufacturers' => $this->manufacturers,
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
        if ($item->update($request->all())) {
            $item->categories()->sync($request->category);
            $item->tags()->sync($request->selectedtags);

            return response()->json($item);
        }

        // TODO: Return error message as JSON
        return false;
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
