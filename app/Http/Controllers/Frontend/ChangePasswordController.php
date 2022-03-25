<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Rules\checkPassword;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB; 
use File;
use Datatables;
use Auth;
use Exception;
use Illuminate\Support\Str; 
use App\Models\HakAksesModel;
use Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $users = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();
                    
        return view('auth.changepassword', compact('users'));
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'password' => [new checkPassword],
            'newpassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        $pesan = 'Password berhasil diubah';
        return redirect('/changepassword')->with(['created' => $pesan]);
    }
}