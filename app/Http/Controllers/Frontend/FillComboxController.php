<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Journal;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FillComboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountcode()
    {
        $accountCode = Journal::pluck('code', 'id');

        return json_encode($accountCode);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $category = Category::pluck('name', 'id');
        
        return json_encode($category);

    }
}
