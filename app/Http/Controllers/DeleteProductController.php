<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteProductController extends Controller
{
    public function index($id, Request $request){
        DB::table('images')->where('product_id', '=', $id)->delete();
        DB::table('products')->where('id', '=', $id)->delete();
        
        //Storage::delete('images.'.$product);

      return redirect('/viewProduct');
    }
}
