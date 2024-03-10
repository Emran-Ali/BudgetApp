<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeCostController extends Controller
{
    function dashboard(){
        $user = DB::table('income_costs')
            ->where('user_id', Auth::user()->id)->get();
//        dd($user->all());
        return view('dashboard',['user'=>$user[0]]);
    }

}
