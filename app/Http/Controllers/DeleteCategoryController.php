<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeleteCategoryController extends Controller
{
    public function index($id, Request $request){
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
          DB::table('category')->where('id', '=', $id)->delete();
          
          
          //Storage::delete('images.'.$product);
  
        return redirect('/categoryView');
        }
      }
}
