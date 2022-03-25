<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HakAksesModel;
use DB;
use Auth;
class RekamDataController extends Controller
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

        $rekamdata = DB::table('users')
                    ->where('users.roleid', '1')
                    ->where('users.Status', 'OPN')
                    ->get();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.rekamdata.index', ['rekamdata'=>$rekamdata, 'Role'=>$Role, 'user'=>$user]);
    }

    public function detail($id)
    {   
        $user = DB::table('users')
                ->where('id', $id)
                ->where('roleid', '1')
                ->get();

        $rekamdata = DB::table('rekamdatas')
                    ->join('users', 'users.id', '=', 'rekamdatas.KodeUser')
                    ->where('rekamdatas.KodeUser', $id)
                    ->where('rekamdatas.Status', 'OPN')
                    ->get();

        $terhapus = DB::table('rekamdatas')
                    ->join('users', 'users.id', '=', 'rekamdatas.KodeUser')
                    ->where('rekamdatas.KodeUser', $id)
                    ->where('rekamdatas.Status', 'DEL')
                    ->count();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.rekamdata.detail', ['terhapus'=>$terhapus, 'rekamdata'=>$rekamdata, 'Role'=>$Role, 'user'=>$user]);
    }

    public function terhapus($id)
    {   
        $user = DB::table('users')
                ->where('id', $id)
                ->where('roleid', '1')
                ->get();

        $rekamdata = DB::table('rekamdatas')
                    ->join('users', 'users.id', '=', 'rekamdatas.KodeUser')
                    ->where('rekamdatas.KodeUser', $id)
                    ->where('rekamdatas.Status', 'DEL')
                    ->get();

        $aktif = DB::table('rekamdatas')
                    ->join('users', 'users.id', '=', 'rekamdatas.KodeUser')
                    ->where('rekamdatas.KodeUser', $id)
                    ->where('rekamdatas.Status', 'OPN')
                    ->count();

        $Role = HakAksesModel::GetRoleUser();
        return view('backend.rekamdata.terhapus', ['aktif'=>$aktif, 'rekamdata'=>$rekamdata, 'Role'=>$Role, 'user'=>$user]);
    }

    public function destroy($authid, $id)
    {
        DB::table('rekamdatas')->where('KodeRD', $id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Rekam data ' . $id . ' berhasil dihapus';
        return redirect('/admin/rekamdata/'.$authid)->with(['deleted' => $pesan]); 
    }
}
