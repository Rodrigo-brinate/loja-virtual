<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RegisterProduct;
use App\Models\Category;
use App\Models\RegisterImage;

class ProductController extends Controller
{
    public function index($id, Request $request){


        $product = DB::table('products')
        ->join('images', 'products.id', '=', 'images.product_id')->where('images.product_id', '=', $id)->get();
                //checks if exist a session
                $name = $request->session()->get('name');
                $ranking = $request->session()->get('ranking');
                $commnet = DB::table('comment')->limit(10)->where('comment.product_id', '=', $id)
                ->join('users', 'comment.user_id', '=', 'users.id')->get();

               // $category = DB::table('category')->limit(10)->get();
                $category = Category::select('category_name')
            ->limit(10)
            ->get();
            
                if ($name){
                    return view('product', [
                         'name' => $name,
                     'ranking' => $ranking,
                     'product'=> $product,
                     'category' => $category,
                     'comment'=> $commnet,
                    ]);
                }else{
        
                    return view('product',
                     [ 'name' => null,
                      'ranking' => null,
                       'product'=> $product,
                       'category' => $category,
                       'comment'=> $commnet,
                    ]);
                }
        
    }


    public function create(Request $request){
        
      
/// busca categorias para o cabeçalho 
$category_header = RegisterCategory::select('category_name')
->limit(10)
->get();
/// busca as categorias bara o formulário
$category = RegisterCategory::select('id', 'category_name')
->get();

/// busca o ranking  do usuario
$ranking = $request
->session()
->get('ranking');


if ($ranking == 2 || $ranking == null){


    return redirect('/');


}else{

return view('adm.addProduct' ,[
     'sucess' => null,
     'erro' => null,
     'ranking'=> $ranking,
     'category_header' => $category_header,
     'category' => $category
        ] );
}
    }


    public function store(Request $request){
        
        
        $category = RegisterCategory::select('category_name')
        ->get();


//// get the datas of form 
        $name_product = $request->input('name');
        $description = $request->input('description');
        $value = $request->input('value');
        $photo_main = $request->file('main');
        $category_id = $request->input('category');
        
///////////////////////////////////////////////////////////////////////////////////////////

//var_dump($name_product);
//var_dump($description);
//var_dump($value);
var_dump(str_replace('/','',$name_product ));
$name_product = str_replace('/','',$name_product );

$name_photo_main = uniqid(date('HisYmd'));

$extension_main = $photo_main->extension();
$nameFile_main = "{$name_photo_main}.{$extension_main}";
$photo_main = $photo_main->storeAs('photo_main', $nameFile_main);


$product = RegisterProduct::select('product_name')
->where('product_name', $name_product)
->first();



if ($product == NULL){


/// save the datas of product 
RegisterProduct::create([
             'product_name' => $name_product,
             'product_description' => $description,
             'photo_main' => $photo_main,
             'user_id' => $request->session()->get('id_user'),
             'category_id' => $category_id,
             'value' => $value 
]);
////////////////////////////////////////////////////////

   
   
   
   
    
//// check o last id registred in database
$product = RegisterProduct::select('id')
->orderBy('id', 'desc')
->first();

$lastProduct = $product->id ;

////////////////////////////////////////////////////////////




///// get the image of form 
      $images =  $request->file('image');
////////////////////////////////////////////////////////////////



//// wallks the array of image capitured of form
        foreach ($images as $image){
/////////////////////////////////////////////////////////////          



///// generate the name ramndomic
       $name = uniqid(date('HisYmd'));
//////////////////////////////////////////////////////////////

///// get the extension of file
        $extension = $image->extension();
 ///////////////////////////////////////////////////////////////

        // define the name of file
        $nameFile = "{$name}.{$extension}";
///////////////////////////////////////////////////////////////////

/// does upload of file
       $upload = $image->storeAs('images', $nameFile);
////////////////////////////////////////////////////////////////////

/// insert the image in database
RegisterImage::create([
    'image' => $upload,
    'product_id' => $lastProduct
]);

    $ranking = $request
    ->session()
    ->get('ranking');
       
        }
        $category_header = RegisterCategory::select('category_name')
        ->limit(10)
        ->get();

        $category = RegisterCategory::select('category_name')->get();
        return view('adm.addProduct', [
            'erro' => null,
            'sucess' => 'produto cadastrado com sucsso',
            'ranking'=> $ranking,
            'category' => $category,
            'category_header' => $category_header,
            ]);
    }else{
       $category_header = RegisterCategory::select('category_name')
        ->limit(10)
        ->get();

        $category = RegisterCategory::select('id', 'category_name')
        ->get();

        $ranking = $request
        ->session()
        ->get('ranking');

        return view('adm.addProduct', [
            'sucess' => null,
            'erro' => 'ops! já existe um produto com esse nome',
            'ranking'=> $ranking,
            'category' => $category,
            'category_header' => $category_header,
            ]);
    }
}


public function show(Request $request){
    $ranking = $request->session()->get('ranking');
    $product = DB::table('products')->join('users', 'users.id', '=', 'products.user_id')->get();
    $category = DB::table('category')->limit(10)->get();
  
    return view('adm.viewProduct', [
        'product'=> $product,
        'category' => $category,
        'ranking'=> $ranking
        ]);
}


public function destroy($name, Request $request){

    
    $ranking = $request->session()->get('ranking');

    if ($ranking == 2 || $ranking == null){
        return redirect('/login');
    }else{
      
     $product = DB::table('products')->where('product_name', '=', $name)->first();
$id = $product->id;
var_dump($id);
      DB::table('images')->where('product_id', '=', $id)->delete();
      DB::table('comment')->where('product_id', '=', $id)->delete();
      DB::table('products')->where('id', '=', $id)->delete();
      
      //Storage::delete('images.'.$product);

    return redirect('/viewProduct');
    }
}


public function edit($id, Request $request){
    $ranking = $request->session()->get('ranking');
    if ($ranking == 2 || $ranking == null){
        return redirect('/');
    }else{
    $category = DB::table('category')->limit(10)->get();
    $product = DB::table('products')->where('product_name', '=', $id)->first();
    return view('adm.editProduct' , ['product'=> $product, 'category' => $category, 'ranking'=> $ranking]);
    }
}

public function update($id, Request $request){
    DB::table('products')
    ->where('product_name', $id)
    ->update([
        'product_name' => $request->input('product_name'),
        'product_description' => $request->input('product_description'),
        'value' => $request->input('value')
    ]);
    return redirect('/viewProduct');
    }
}
