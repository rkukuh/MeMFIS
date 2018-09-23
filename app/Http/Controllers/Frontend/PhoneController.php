<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Phone;
use App\model\ListUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PhoneStore;
use App\Http\Requests\Frontend\PhoneUpdate;

class PhoneController extends Controller
{
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
     * @param  \App\Http\Requests\Frontend\PhoneStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneStore $request)
    {
        $phone = Phone::create([
            // 'abbr' => $request->abbr,
            // 'name' => $request->name,
        ]);

        return response()->json($phone);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PhoneUpdate  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneUpdate $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
