<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $products = DB::table('cart')
        ->join('products', 'products.id', '=', 'cart.product_id')
        ->where('cart.user_id', '=', $id)
        ->get();

        return response()->json($products); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_user, $id_product,Request $request)
    {

        if (Cart::where('user_id', $id_user )->where('product_id', $id_product)->first()){

        }else{
            Cart::create([
            'product_id' => $id_product,
            'user_id' => $id_user
        ]);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user, $id_product,Request $request)
    {
        if (Cart::where('user_id', $id_user )->where('product_id', $id_product)->first()){
            Cart::where('user_id', $id_user )->where('product_id', $id_product)->delete();
        }else{}
    }

    
}
