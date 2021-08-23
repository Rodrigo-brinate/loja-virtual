<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select('id', 'category_name')->get();

        return response()->json($category); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $name = $request->input('name');
        $ranking = User::select('ranking')->where('id', $request->input('id'))->where('email', $request->input('email'))->first();
         if ($ranking == '3' || $ranking == null){
            return response()->json( ['res'=> 'e','response' => 'ação negada']);

         }else{
        if ($name == null){
            return response()->json( ['res'=> 'e','response' => 'não foi possivel cadastrar categoria']);

        }else{

            $category = Category::where('category_name', $name)->first();
            if ($category == null){

            
            return response()->json( ['res'=> 's','response' => 'categoria cadastrada com sucesso']);
            Category::create([
            'category_name' => $name,
        ]);
    }else{
        return response()->json( ['res'=> 'e','response' => 'essa categoria já existe']);

    }
        }}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function filter($id, Request $request)
    {
        $product = Product::where('category_id', $id)->get();

        $name = $request->input('name');
        $ranking = User::select('ranking')->where('id', $request->input('id'))->where('email', $request->input('email'))->first();
        if ($ranking == '3' || $ranking == null){

        }else{
            return response()->json( ['res'=> 'e','response' => 'ação negada']);
            return response()->json($product);
        }
        
        
    }


    public function show(Request $request)
    {


        return response()->json(Category::get());
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


    public function search(Request $request){

        $product = $request->input('name');
      $pesquisa = Category::where('category_name', 'like', '%'.$product.'%')->get();
  
      return response()->json($pesquisa); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('category_id',$id)->delete();
        Category::where('id', $id)->delete();
    }


    public function name($id){
       $category = Category::select('category_name')->where('id', $id)->first();
       return response()->json($category);
    }
}
