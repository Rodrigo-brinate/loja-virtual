<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function index(){
        return view('addProduct');
    }

    public function add(Request $request) {

      $a =  $request->file('image');



        //var_dump($request->image);
        foreach ($a as $image){
           # $nameFile = null;


       $name = uniqid(date('HisYmd'));
 
        // Recupera a extensão do arquivo
        $extension = $image->extension();
 
        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
       $upload = $image->storeAs('categories', $nameFile);
       var_dump($upload);
        }
        /*
        $nameFile = null;

        $name = uniqid(date('HisYmd'));
 
        // Recupera a extensão do arquivo
        $extension = $request->image->extension();
 
        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
        $upload = $request->image->storeAs('categories', $nameFile);
        var_dump($upload);*/
    }
}
