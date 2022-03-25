<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HakAksesModel;
use DB;
use Auth;
use Hash;

class ManajemenUserController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');            
    }

    public function index()
    {   
        $user = DB::table('users')
                ->where('roleid', '1')
                ->where('status', 'OPN')
                ->get();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.manajemenuser.index', ['Role'=>$Role, 'user'=>$user]);
    }

    public function create()
    {
        $Role = HakAksesModel::GetRoleUser();
        return view('backend.manajemenuser.create', [
            'Role'=>$Role
    ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'fullname' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::table('users')->insert([
            'Username' => $request->Username,
            'fullname' => $request->fullname,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'status' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'roleid' => '2',
        ]);

        $pesan = 'User ' . $request->Username . ' berhasil ditambahkan';
        return redirect('/admin/user/backend')->with(['created' => $pesan]);
    }

    public function biasadestroy($id)
    {
        DB::table('users')->where('id', $id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Akun ' . $id . ' berhasil dihapus';
        return redirect('/admin/user/biasa')->with(['deleted' => $pesan]); 
    }

    public function backendindex()
    {   
        $user = DB::table('users')
                ->where('roleid', '2')
                ->where('status', 'OPN')
                ->get();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.manajemenuser.backendindex', ['Role'=>$Role, 'user'=>$user]);
    }

    public function backenddestroy($id)
    {
        DB::table('users')->where('id', $id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Akun ' . $id . ' berhasil dihapus';
        return redirect('/admin/user/backend')->with(['deleted' => $pesan]); 
    }
}
