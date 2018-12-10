<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CurrencyStore;
use App\Http\Requests\Frontend\CurrencyUpdate;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.currency.index');
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
     * @param  \App\Http\Requests\Frontend\CurrencyStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyStore $request)
    {
        $currencies = Currency::create($request->all());

        return response()->json($currencies);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return response()->json($bank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\CurrencyUpdate  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyUpdate $request, Currency $currency)
    {
        $currency->update($request->all());

        return response()->json($currency);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return response()->json($currency);
    }
}
