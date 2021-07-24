<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryViewController extends Controller
{
    public function index(Request $request){
        $category = DB::table('category')->limit(10)->get();
        $category_view = DB::table('category')->get();
        $ranking = $request->session()->get('ranking');
        return view('adm.categoryView', ['category' => $category,'category_view' => $category_view, 'ranking'=> $ranking]);
    }
}
