<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request){
        $product = DB::table('products')->get();
        $category = DB::table('category')->limit(10)->get();

       // $product = DB::table('products')->orderBy('id', 'desc')->get();
      

        //checks if exist a session
        $name = $request->session()->get('name');
        $ranking = $request->session()->get('ranking');
      
        if ($name){
            return view('index', [
                 'name' => $name,
                  'ranking' => $ranking,
                   'product' => $product,
                    'category' => $category
                ]);
        }else{

            return view('index', [ 
                'name' => null,
                 'ranking' => null,
                   'product' => $product,
                    'category' => $category
                ]);
        }




        }
        
}
