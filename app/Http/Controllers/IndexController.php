<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){


        //checks if exist a session
        $name = $request->session()->get('name');
        $ranking = $request->session()->get('ranking');
      
        if ($name){
            return view('index', [ 'name' => $name, 'ranking' => $ranking]);
        }else{

            return view('index', [ 'name' => null, 'ranking' => null]);
        }




        }
        
}
