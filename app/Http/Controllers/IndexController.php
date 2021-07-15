<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){


        //checks if exist a session
        $name = $request->session()->get('name');
        if ($name){
            return view('index', [ 'name' => $name]);
        }else{

            return view('index', [ 'name' => null]);
        }




        }
        
}
