<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HakAksesModel;
use DB;
use Auth;
class PanelController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');            
    }

    public function index()
    {   
        $Role = HakAksesModel::GetRoleUser();
        return view('backend.index',['Role'=>$Role]);
    }
}
