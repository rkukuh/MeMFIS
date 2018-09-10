<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = DB::table("banks")
                    ->pluck("name","id")->all();
        return json_encode($bank);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Bank = Bank::create([
            'abbr' => $request->abbr,
            'name' => $request->name,
        ]);

        return response()->json($Bank);

    }
}
