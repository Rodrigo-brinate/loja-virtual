<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewProductController extends Controller
{
    public function index(){

        $product = DB::table('products')->get();
        return view('viewProduct', ['product'=> $product]);
    }
}
