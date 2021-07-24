<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCategoryController extends Controller
{
    public function index(Request $request){
        $category = DB::table('category')->limit(10)->get();
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
        return view('adm.addCategory' ,[
            'sucess' => null,
            'erro' => null,
             'ranking'=> $ranking, 
             'category' => $category
         ] );
    }}

    public function add(Request $request){
        $category = DB::table('category')->where('category_name', '=', $request->input('name'))->first();
       
        $ranking = $request->session()->get('ranking');
        if ($category == null){
            DB::table('category')->insert(
                ['category_name' => $request->input('name')]
            );
            return redirect('/addCategory');
        }
        else {
            $category = DB::table('category')->limit(10)->get();
            return view('adm.addCategory' ,['sucess' => null, 'erro' => 'essa categoria ja existe' ,'category' => $category, 'ranking'=> $ranking]);
        }
    }
}
