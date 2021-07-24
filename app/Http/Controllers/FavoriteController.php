<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
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

        $product = DB::table('favorite')
        ->join('products', 'products.id', '=', 'favorite.product_id')
        ->where('favorite.user_id', '=', $user_id)
        ->get();

        $total = 0;
        foreach ($product as $item){
           $total += $item->value;
        }
                    
        return view('favorite',
        [
       'ranking' => $ranking,
       'name' => $name,
       'category' => $category,
       'product' => $product,
       'total' => $total
       ]);
}


    public function add(Request $request){
if($request
->session()
->get('id_user')){



       $id = $request
       ->input('id');

       $user_id = $request
        ->session()
        ->get('id_user');

$product = DB::table('favorite')
        ->where('product_id', '=', $id)
        ->first();

if(!$product){
        DB::table('favorite')
            ->insert(
                [
                'product_id' => $id,
                'user_id' => $user_id
                     ]

            );
        }
        return redirect('/#product');
    }else {
        return redirect('/login');
    }
    }

    public function delete($id){
        $product = DB::table('favorite')->where('favorite.product_id', '=', $id);
        if($product){
            DB::table('favorite')->where('favorite.product_id', '=', $id)->delete();
            return redirect('/favorite');
    }
}}
