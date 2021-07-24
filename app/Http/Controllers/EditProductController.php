<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EditProductController extends Controller
{
    public function index($id, Request $request){
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
        $category = DB::table('category')->limit(10)->get();
        $product = DB::table('products')->where('product_name', '=', $id)->first();
        return view('adm.editProduct' , ['product'=> $product, 'category' => $category, 'ranking'=> $ranking]);
    }}

    public function edit($id, Request $request){
        DB::table('products')
        ->where('product_name', $id)
        ->update([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'value' => $request->input('value')
        ]);
        return redirect('/viewProduct');
    }
}
