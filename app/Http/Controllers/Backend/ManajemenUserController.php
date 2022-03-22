<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HakAksesModel;
use DB;
use Auth;
class ManajemenUserController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');            
    }

    public function index()
    {   
        $user1 = DB::table('users')
                ->where('roleid', '1')
                ->where('status', 'OPN')
                ->get();

        $user2 = DB::table('users')
                ->where('roleid', '2')
                ->where('status', 'OPN')
                ->get();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.manajemenuser.index', ['Role'=>$Role, 'user1'=>$user1, 'user2'=>$user2]);
    }

    public function backendindex()
    {   
        $Role = HakAksesModel::GetRoleUser();
        return view('backend.manajemenuser.backendindex', ['Role'=>$Role]);
    }
}
