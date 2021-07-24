<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id, Request $request){


        $product = DB::table('products')
        ->join('images', 'products.id', '=', 'images.product_id')->where('images.product_id', '=', $id)->get();
                //checks if exist a session
                $name = $request->session()->get('name');
                $ranking = $request->session()->get('ranking');
                $commnet = DB::table('comment')->limit(10)->where('comment.product_id', '=', $id)
                ->join('users', 'comment.user_id', '=', 'users.id')->get();
                $category = DB::table('category')->limit(10)->get();
            
                if ($name){
                    return view('product', [
                         'name' => $name,
                     'ranking' => $ranking,
                     'product'=> $product,
                     'category' => $category,
                     'comment'=> $commnet,
                    ]);
                }else{
        
                    return view('product',
                     [ 'name' => null,
                      'ranking' => null,
                       'product'=> $product,
                       'category' => $category,
                       'comment'=> $commnet,
                    ]);
                }
        
    }
}
