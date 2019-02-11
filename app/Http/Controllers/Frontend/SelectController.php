<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class SelectController extends Controller
{
    public function select()
    {
        $country = DB::table("select")
                    ->pluck("name","id")->all();
        return json_encode($country);
    }
    public function complate($id)
    {
        $country = DB::table("select")->find($id);
        return response()->json($country);
        // return json_encode($country);
    }

   
}
