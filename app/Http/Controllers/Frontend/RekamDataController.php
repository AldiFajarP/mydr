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

class RekamDataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $rekamdata = DB::table('rekamdatas')
                    ->where('KodeUser', Auth::id())
                    ->where('Status', 'OPN')
                    ->get();

        return view('frontend.rekamdata.index', compact('rekamdata'));
    }

    public function store(Request $request)
    {   
        $last_id = DB::select('SELECT * FROM rekamdatas ORDER BY KodeRD DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "KRD-001";
        } else {
            $string = $last_id[0]->KodeRD;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "KRD-" . $new;
        }

        DB::table('rekamdatas')->insert([
            'KodeRD' => $newID,
            'Tanggal' => $request->Tanggal,
            'Waktu' => $request->Waktu,
            'Lokasi' => $request->Lokasi,
            'NamaTempat' => $request->NamaTempat,
            'JenisTempat' => $request->JenisTempat,
            'SuhuTubuh' => $request->SuhuTubuh,
            'Keterangan' => $request->Keterangan,
            'Status' => 'OPN',
            'KodeUser' => Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Rekam data ' . $newID . ' berhasil ditambahkan';
        return redirect('/rekamdata')->with(['created' => $pesan]); 
    }

    public function edit($id)
    {   
        $rekamdata = DB::table('rekamdatas')
                    ->where('KodeUser', Auth::id())
                    ->where('Status', 'OPN')
                    ->get();

        $idrekamdata = DB::table('rekamdatas')
                    ->where('KodeUser', Auth::id())
                    ->where('KodeRD', $id)
                    ->get();

        return view('frontend.rekamdata.edit', compact('rekamdata', 'idrekamdata'));
    }

    public function update(Request $request)
    {
        DB::table('rekamdatas')->where('KodeRD', $request->KodeRD)->update([
            'Tanggal' => $request->Tanggal,
            'Waktu' => $request->Waktu,
            'Lokasi' => $request->Lokasi,
            'NamaTempat' => $request->NamaTempat,
            'JenisTempat' => $request->JenisTempat,
            'SuhuTubuh' => $request->SuhuTubuh,
            'Keterangan' => $request->Keterangan,
            'KodeUser' => Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Rekam data ' . $request->KodeRD . ' berhasil diubah';
        return redirect('/rekamdata')->with(['edited' => $pesan]); 
    }

    public function destroy($id)
    {
        DB::table('rekamdatas')
        ->where('KodeUser', Auth::id())
        ->where('KodeRD', $id)
        ->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Rekam data ' . $id . ' berhasil dihapus';
        return redirect('/rekamdata')->with(['deleted' => $pesan]); 
    }
}
