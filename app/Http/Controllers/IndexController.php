<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class IndexController extends Controller
{
    public function index(Request $request){
        $product = DB::table('products')->get();
        $category = DB::table('category')->limit(10)->get();
      

       // $product = DB::table('products')->orderBy('id', 'desc')->get();
      
     //var_dump(uniqid(rand(), true));

        //checks if exist a session
        $name = $request->session()->get('name');

        if ($name){
            
  //$user = User::where('name', $name)->first();
  //$id = $user->id;
        $ranking = $request->session()->get('ranking');
     
            return view('index', [
                 'name' => $name,
                // 'id' => $id,
                 'ranking' => $ranking,
                 'product' => $product,
                 'category' => $category
                ]);
        }else{

            return view('index', [ 
                'name' => null,
                 'ranking' => null,
                 'id' => null,
                 'product' => $product,
                 'category' => $category
                ]);
        }




        }


        public function api(Request $request) {
            
        $product = DB::table('products')->get();
        $category = DB::table('category')->limit(10)->get();

       // $product = DB::table('products')->orderBy('id', 'desc')->get();
      

        //checks if exist a session
        $name = $request->session()->get('name');
        $ranking = $request->session()->get('ranking');
      


            return response()->json(['teste'=> $product]);
        }
        
}
