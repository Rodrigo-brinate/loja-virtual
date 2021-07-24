<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request){

        $ranking = $request
        ->session()
        ->get('ranking');

        $user_id = $request
        ->session()
        ->get('id_user');

        $name = $request
        ->session()
        ->get('name');

        $category = DB::table('category')
        ->limit(10)
        ->get();

        $product = DB::table('cart')
        ->join('products', 'products.id', '=', 'cart.product_id')
        ->where('cart.user_id', '=', $user_id)
        ->get();

        $total = 0;
        foreach ($product as $item){
           $total += $item->value;
        }
             
        return view('cart',
         [
        'ranking' => $ranking,
        'name' => $name,
        'category' => $category,
        'product' => $product,
        'total' => $total
        ]);
    }

    public function add($id, Request $request){
        if ($request->session()->get('id_user')){
        $product = DB::table('cart')
        ->where('product_id', '=', $id)
        ->first();

        if($product){

            return redirect('/product'.'/'.$id);

        }else{

            DB::table('cart')
            ->insert(
                [
                    'product_id' => $id,
                     'user_id' => $request
                     ->session()
                     ->get('id_user')]
            );

            return redirect('/product'.'/'.$id);
        }}else{
            return redirect('/login');
        }
       
    }


    public function delete($id){

        $product = DB::table('cart')->where('cart.product_id', '=', $id);
        if($product){
            DB::table('cart')->where('cart.product_id', '=', $id)->delete();
            return redirect('/cart');
        }
    }
}
