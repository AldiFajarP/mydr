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

        $users1 = DB::table('users')
                ->where('status', 'OPN')
                ->count();

        $users2 = DB::table('users')
                ->where('status', 'DEL')
                ->count();

        $rekamdatas1 = DB::table('rekamdatas')
                ->where('status', 'OPN')
                ->count();

        $rekamdatas2 = DB::table('rekamdatas')
                ->where('status', 'DEL')
                ->count();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.dashboard',[
            'Role'=> $Role,
            'users1' => $users1,
            'users2' => $users2,
            'rekamdatas1' => $rekamdatas1,
            'rekamdatas2' => $rekamdatas2,
        ]);
    }
}
