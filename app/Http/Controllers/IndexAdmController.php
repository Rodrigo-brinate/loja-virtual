<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexAdmController extends Controller
{
    public function index(Request $request){
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
        return view('indexAdm', [ 'ranking'=> $ranking]);
        }
    }
}
