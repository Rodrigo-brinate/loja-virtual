<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(){

        $Products = Product::select(
         'id',
         'product_name',
         'product_description', 
         'photo_main', 
         'value')->get();

         return response()->json($Products); 
    }
}
