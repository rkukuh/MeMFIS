<?php

namespace App\Http\Controllers\Frontend;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.testing.index');
    }

    /**
     * Display a listing of the resource on metronic thame.
     *
     * @return \Illuminate\Http\Response
     */
    public function metronic()
    {
        return view('frontend.testing.metronic');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // foreach($arrays as $array){
        //     echo"tes";
        // }
        $file = Input::file('fileInput');
        $ext = $file->getClientOriginalExtension();
        $length = 10;
        $randomString = substr(str_shuffle(md5(time())),0,$length);
        // echo $randomString;
        // $fileName = md5(time()).".$ext";
        $fileName = $randomString.".$ext";

        $destinationPath = "uploads/".date('Y').'/'.date('m').'/';
        $moved_file = $file->move($destinationPath, $fileName);
        $path = $moved_file->getRealPath();
        return Response::json(["success"=>true,"uploaded"=>true, "url"=>$path]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
