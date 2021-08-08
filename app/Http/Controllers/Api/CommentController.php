<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $id = $request->input('id');
    $user_id = $request->input('user_id');
    $comment = $request->input('comment');
    $clacification = $request->input('clacification');

    $rand = uniqid(rand(), true);
        var_dump($rand);

    Comment::create([
        'user_id' => $user_id,
         'product_id' => $id,
         'clacification' => $clacification,
         'comment' => $comment,
         'identification' => $rand
    ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coments = Comment::where('product_id',$id)->join('users', 'comment.user_id', '=', 'users.id')->get();


       

        //->join('images', 'products.id', '=', 'images.product_id')->where('images.product_id', '=', $id)
        return response()->json($coments); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
