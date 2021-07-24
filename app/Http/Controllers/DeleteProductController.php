<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteProductController extends Controller
{
    public function index($name, Request $request){
      
      $ranking = $request->session()->get('ranking');

      if ($ranking == 2 || $ranking == null){
          return redirect('/login');
      }else{
        
       $product = DB::table('products')->where('product_name', '=', $name)->first();
$id = $product->id;
var_dump($id);
        DB::table('images')->where('product_id', '=', $id)->delete();
        DB::table('comment')->where('product_id', '=', $id)->delete();
        DB::table('products')->where('id', '=', $id)->delete();
        
        //Storage::delete('images.'.$product);

      return redirect('/viewProduct');
      }
    }
}
