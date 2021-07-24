<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewProductController extends Controller
{
    public function index(Request $request){
        $ranking = $request->session()->get('ranking');
        $product = DB::table('products')->join('users', 'users.id', '=', 'products.user_id')->get();
        $category = DB::table('category')->limit(10)->get();
      
        return view('adm.viewProduct', ['product'=> $product,'category' => $category, 'ranking'=> $ranking]);
    }
}
