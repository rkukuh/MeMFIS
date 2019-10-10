<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vendor;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\VendorStore;
use App\Http\Requests\Frontend\VendorUpdate;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Type::ofDocument()->get();

        return view('frontend.vendor.create',[
            'documents' => $documents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\VendorStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorStore $request)
    {
        $vendor = Vendor::create([
            // 'abbr' => $request->abbr,
            // 'name' => $request->name,
        ]);

        return response()->json($vendor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('frontend.vendor.show', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $documents = Type::ofDocument()->get();

        return view('frontend.vendor.edit',[
            'documents' => $documents
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\VendorUpdate  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(VendorUpdate $request, Vendor $vendor)
    {
        $vendor = Vendor::find($vendor);
        // $vendor->name = $request->name;
        // $vendor->save();

        return response()->json($vendor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return response()->json($vendor);
    }
}
