<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(Request $request){
        $ranking = $request->session()->get('ranking');
        $name = $request->session()->get('name');
        $email = $request->session()->get('email');
        $profile = DB::table('users')->where('email', '=', $email)->first();
        if($name){
            $category = DB::table('category')->limit(10)->get();
            return view('profile', [ 'category' => $category, 'ranking' => $ranking, 'profile' => $profile]);
        }else{
            return redirect('/login');
        }
     
        
    }
}
