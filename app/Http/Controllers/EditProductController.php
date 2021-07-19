<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EditProductController extends Controller
{
    public function index($id){
        $product = DB::table('products')->where('id', '=', $id)->first();
        return view('editProduct' , ['product'=> $product]);
    }

    public function edit($id, Request $request){
        DB::table('products')
        ->where('id', $id)
        ->update([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'value' => $request->input('value')
        ]);
        return redirect('viewProduct');
    }
}
