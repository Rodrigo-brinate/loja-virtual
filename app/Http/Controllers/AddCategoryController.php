<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCategoryController extends Controller
{
    public function index(Request $request){
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
        return view('addCategory' ,['sucess' => null, 'erro' => null]);
    }}

    public function add(Request $request){
        $category = DB::table('category')->where('category_name', '=', $request->input('name'))->first();
        if ($category == null){
            DB::table('category')->insert(
                ['category_name' => $request->input('name')]
            );
            return redirect('/addCategory');
        }
        else {
            return view('addCategory' ,['sucess' => null, 'erro' => 'essa categoria ja existe']);
        }
    }
}
