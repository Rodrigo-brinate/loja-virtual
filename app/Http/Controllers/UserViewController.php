<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserViewController extends Controller
{
      public function index(Request $request){
        $ranking = $request->session()->get('ranking');
        $user = DB::table('users')->orderBy('ranking', 'asc')->get();
        return view('userView', [ 'user' => $user, 'ranking'=> $ranking]);
      }
}
