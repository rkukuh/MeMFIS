<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Models\Item;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Price;
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
        $this->units = Unit::all();
        $this->manufacturers = Manufacturer::all();
        $this->categories = Category::ofItem()->where('code','<>','tool')->get();
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
        $tags = [];
        if($request->selectedtags){
        foreach($request->selectedtags as $selectedtags ){ array_push($tags,Tag::findOrCreate($selectedtags, 'item'));}
        }
        if ($item = Item::create($request->all())) {
            $item->categories()->attach($request->category);
            $item->syncTags($tags);

            for($i=1;$i<=5;$i++){
                $item->prices()
                ->save(new Price (['amount' =>0,'level' =>$i]));
            }

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
        $tags = array();
        foreach($item->tags as $i => $item_tag){
            $tags[$i] =  $item_tag->name;
        }

        return view('frontend.item.material.show', [
            'item' => $item,
            'item_tags' => $tags,
            'tags' => $this->tags,
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
        $tags = [];
        foreach($request->selectedtags as $selectedtags ){ array_push($tags,Tag::findOrCreate($selectedtags, 'item'));}
        if ($item->update($request->all())) {
            $item->categories()->sync($request->category);
            $item->syncTags($tags);

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
