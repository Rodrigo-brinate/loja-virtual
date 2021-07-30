<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class CommentController extends Controller
{


    public function index(){
        //$category = DB::table('comment')->limit(10)->get();







    }
    public function create( Request $request){
if ($request->session()->get('id_user')){
        $comment = $request->input('comment');
        $clacification = $request->input('clacification');
        $id = $request->input('id');
        $user_id = $request
        ->session()
        ->get('id_user');

        var_dump($clacification);
        
        Comment::create([
            'user_id' => $request->session()->get('id_user'),
             'product_id' => $id,
             'clacification' => $clacification,
             'comment' => $comment,
        ]);
    
        return redirect('/product'.'/'.$id);
    }else{
       
        //$category = DB::table('category')->limit(10)->get();

      
       
       
        return redirect('/login');

    }
}}
