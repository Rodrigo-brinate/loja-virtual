<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryViewController extends Controller
{
    public function index(){
        $category = DB::table('category')->get();
        return view('categoryView', ['category' => $category]);
    }
}
