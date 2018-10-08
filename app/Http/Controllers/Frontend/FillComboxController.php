<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Journal;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FillComboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountCodes()
    {
        $accountCodes = Journal::pluck('code', 'id');

        return json_encode($accountCodes);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Category::pluck('name', 'id');

        return json_encode($categories);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currencies()
    {
        $currencies = Currency::pluck('name', 'id');

        return json_encode($currencies);

    }
}
