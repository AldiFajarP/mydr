<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class IndexController extends Controller
{

    public function index()
    {
        return view('frontend.index');
    }
}
