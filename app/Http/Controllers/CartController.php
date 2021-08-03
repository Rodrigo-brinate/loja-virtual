<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\RegisterProduct;
use App\Models\Cart;
use App\Models\User;

class CartController extends Controller
{
    public function index( Request $request){
if ($request->session()->get('name')){
        $ranking = $request
        ->session()
        ->get('ranking');

        $user_id = $request
        ->session()
        ->get('id_user');

        $name = $request
        ->session()
        ->get('name');

        ///busca o usuario
        $user = User::where('name', $name)->first();
        $id = $user->id;

        /// busca as categorias 
        $category = Category::select('category_name')
        ->limit(10)
        ->get();

        //faz a busca dos produtos que estão no carrinho
        $products = DB::table('cart')
        ->join('products', 'products.id', '=', 'cart.product_id')
        ->where('cart.user_id', '=', $user_id)
        ->get();

        // gera o o valor total dos produtos no carrinho 
        $total = 0;
    foreach ($products as $item){
           $total += $item->value;
        }
        return view('cart',
         [
        'ranking' => $ranking,
        'name' => $name,
        'category' => $category,
        'products' => $products,
        'total' => $total
        ]);
    }else{
        return redirect('/login');
    }
    }

    public function create($id, Request $request){
        if ($request->session()->get('id_user')){
            $product = Cart::where('product_id', $id)->first();
        if($product){
            return redirect('/product'.'/'.$id);
        }else{
            Cart::create([
                'product_id' => $id,
                'user_id' => $request
                ->session()
                ->get('id_user')
            ]);
            return redirect('/product'.'/'.$id);
        }
    }else{
            return redirect('/login');
        }
    }


    public function delete($id){

        $product = DB::table('cart')->where('cart.product_id', '=', $id);
        if($product){
        Cart::where('cart.product_id', '=', $id)->delete();
            return redirect('/cart');
        }
    }
}
