<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditCategoryController extends Controller
{
    public function index($id, Request $request){
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
        $category = DB::table('category')->where('id', '=', $id)->first();
        return view('editCategory' , ['category'=> $category]);
    }}


    public function edit($id, Request $request){
        DB::table('category')
        ->where('id', $id)
        ->update([
            'Category_name' => $request->input('name'),
            
        ]);
        return redirect('categoryView');
    }
}
