<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = DB::table('products')
        ->join('images', 'products.id', '=', 'images.product_id')->where('images.product_id', '=', $id)->get();
       //var_dump($product);
        return response()->json($product); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::select('category_name')
        ->get();

            # get the datas of form 
        $name_product = $request->input('name');
        $description = $request->input('description');
        $value = $request->input('value');
        $photo_main = $request->file('photo_main');
        $category_id = $request->input('category');
        $user_id = $request->input('id');

        var_dump($request->file('image'));
        var_dump($request->input('image'));
        
    
        //var_dump(str_replace('/','',$name_product ));
        $name_product = str_replace('/','',$name_product );
    
        $name_photo_main = uniqid(date('HisYmd'));
    
        $extension_main = $photo_main->extension();
        $nameFile_main = "{$name_photo_main}.{$extension_main}";
        $photo_main = $photo_main->storeAs('photo_main', $nameFile_main);
    
    
        $product = Product::select('product_name')
        ->where('product_name', $name_product)
        ->first();
    
    
    
        if ($product == NULL){
    
    
        /// save the datas of product 
            Product::create([
                'product_name' => $name_product,
                'product_description' => $description,
                'photo_main' => $photo_main,
                'user_id' => $user_id,
                'category_id' => $category_id,
                'value' => $value 
            ]);
            
            # check o last id registred in database
            $product = Product::select('id')
            ->orderBy('id', 'desc')
            ->first();
    
            $lastProduct = $product->id;
    
                # get the image of form 
            $images =  $request->file('image');
    
                # wallks the array of image capitured of form
            foreach ($images as $image){
    
    
                    # generate the name ramndomic
                $name = uniqid(date('HisYmd'));
    
    
                    # get the extension of file
                $extension = $image->extension();
    
                    # define the name of file
                $nameFile = "{$name}.{$extension}";
    
                    # does upload of file
                $upload = $image->storeAs('images', $nameFile);
    
                     # insert the image in database
                Image::create([
                    'image' => $upload,
                    'product_id' => $lastProduct,
                ]);
         } }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
