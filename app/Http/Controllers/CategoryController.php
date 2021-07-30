<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::select('category_name')->limit(10)->get();
        
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
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

        // $category = DB::table('category')->where('category_name', '=', $request->input('name'))->first();
       
       $category = Category::firstWhere('category_name', '=', $request->input('name'));


       $ranking = $request->session()->get('ranking');
       if ($category == null){
            Category::create([
                'category_name' => $request->input('name')
            ]);

         //  DB::table('category')->insert(
          //     ['category_name' => $request->input('name')]
          // );
           return redirect('/addCategory');
       }
       else {


           //$category = DB::table('category')->limit(10)->get();
           
           $category = Category::select('category_name')->limit(10)->get();
          
           return view('adm.addCategory' ,['sucess' => null, 'erro' => 'essa categoria ja existe' ,'category' => $category, 'ranking'=> $ranking]);
       }


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
    public function show(Request $request)
    {
        
        $category = Category::select('category_name')
        ->limit(10)
        ->get();
        
        $category_view = Category::select('id','category_name')
        ->get();

        $ranking = $request
        ->session()
        ->get('ranking');

        return view('adm.categoryView', [
            'category' => $category,
            'category_view' => $category_view,
             'ranking'=> $ranking
            ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
            $category_header = Category::select('category_name')
            ->limit(10)
            ->get();

        //$category = DB::table('category')->where('id', '=', $id)->first();
        $category = Category::where('id', '=', $id)->first();
        var_dump($category->category_name);
        return view('adm.editCategory' , ['category'=> $category,'category_header'=> $category_header, 'ranking'=> $ranking]);
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id, Request $request)
    {
        //DB::table('category')
        //->where('id', $id)
        //->update([
        //    'Category_name' => $request->input('name'),
        //    
        //]);

        Category::where('id', $id)
        ->update([
            'Category_name' => $request->input('name'),
        ]);


        return redirect('categoryView');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
         // DB::table('category')->where('id', '=', $id)->delete();
          Category::where('id', '=', $id)->delete();
          
          //Storage::delete('images.'.$product);
  
        return redirect('/categoryView');
        }
    }
}
