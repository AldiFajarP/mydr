<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HakAksesModel extends Model
{
    use HasFactory;

    public static function getRoleUser(){
        $role = DB::table('users')
            ->join('roles','users.roleId','=','roles.id')
            ->where('users.id',Auth::id())
            ->select('roles.name')->get();
        return $role;
    }
}
