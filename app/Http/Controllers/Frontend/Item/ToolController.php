<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemStore;
use App\Http\Requests\Frontend\ItemUpdate;

class ToolController extends Controller
{
    protected $units;
    protected $categories;
    protected $manufacturers;

    public function __construct()
    {
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
        return view('frontend.item.tool.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.item.tool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStore $request)
    {
        if ($tool = Item::create($request->all())) {
            $tool->categories()->attach($request->category);

            return response()->json($tool);
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
    public function show(Item $tool)
    {
        return view('frontend.item.tool.show', [
            'item' => $tool,
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
    public function edit(Item $tool)
    {
        return view('frontend.item.tool.edit', [
            'item' => $tool,
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
    public function update(ItemUpdate $request, Item $tool)
    {
        if ($tool->update($request->all())) {
            $tool->categories()->sync($request->category);

            return response()->json($tool);
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
    public function destroy(Item $tool)
    {
        $tool->delete();

        return response()->json($tool);
    }
}
