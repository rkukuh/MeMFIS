<?php

namespace App\Http\Controllers\Frontend\Service;

use App\Models\Service;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Price;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ServiceStore;
use App\Http\Requests\Frontend\ServiceUpdate;

class ServiceController extends Controller
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
        $this->categories = Category::ofItem()->where('code', 'service')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ServiceStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStore $request)
    {
        $tags = [];
        if($request->selectedtags){
        foreach($request->selectedtags as $selectedtags ){ array_push($tags,Tag::findOrCreate($selectedtags, 'service'));}
        }
        if ($service = Service::create($request->all())) {
            $service->categories()->attach($this->categories->id);
            $service->syncTags($tags);

            for($i=1;$i<=5;$i++){
                $service->prices()
                ->save(new Price (['amount' =>0,'level' =>$i]));
            }

            return response()->json($service);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('frontend.service.show', [
            'item' => $service,
            'units' => $this->units,
            'categories' => $this->categories,
            'manufacturers' => $this->manufacturers,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $tags = array();
        foreach($service->tags as $i => $service_tag){
            $tags[$i] =  $service_tag->name;
        }

        return view('frontend.service.edit', [
            'item' => $service,
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
     * @param  \App\Http\Requests\Frontend\ServiceUpdate  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdate $request, Service $service)
    {
        $tags = [];
        if($request->selectedtags){
            foreach($request->selectedtags as $selectedtags ){ array_push($tags,Tag::findOrCreate($selectedtags, 'service'));}
        }
        if ($service->update($request->all())) {
            $service->syncTags($tags);

            return response()->json($service);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json($service);
    }
}
