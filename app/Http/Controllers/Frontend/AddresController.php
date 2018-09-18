<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AddresController extends Controller
{
    /**
     * Show data Country.
     * 
     * @return \Illuminate\Http\Response
     */
    public function Country()
    {
        $country = DB::table("countries")
                    ->pluck("country_name","country_id")->all();
        return json_encode($country);
    }

    /**
     * Show data City.
     * 
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function City($id)
    {
        $city = DB::table("cities")
                    ->where("country_id",$id)
                    ->pluck("city_name","city_id")->all();
        return json_encode($city);
    }
}
