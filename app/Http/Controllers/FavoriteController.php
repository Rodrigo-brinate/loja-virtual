<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Favorite;

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

        $category = Category::select('category_name')
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


    public function create(Request $request){
    if($request->session()->get('id_user')){



       $id = $request
       ->input('id');

       $user_id = $request
        ->session()
        ->get('id_user');

        $product = Favorite::where('product_id', '=', $id)
        ->first();


    if(!$product){
        Favorite::create([
            'product_id' => $id,
            'user_id' => $user_id
        ]);
    }
        return redirect('/#product');

    }else{

        return redirect('/login');
    }
}

    public function delete($id){
        $product = Favorite::where('favorite.product_id', $id);
        if($product){
            Favorite::where('favorite.product_id', $id)->delete();
            return redirect('/favorite');
    }
}}
