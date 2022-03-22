<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB; 
use File;
use Datatables;
use Auth;
use Exception;
use Illuminate\Support\Str; 
use App\Models\HakAksesModel;

class TentangAkunController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $akun = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();

        return view('frontend.tentangakun.index', compact('akun'));
    }
}