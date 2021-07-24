<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddProductController extends Controller
{
    public function index(Request $request){
       
        $category = DB::table('category')->limit(10)->get();

        $ranking = $request->session()->get('ranking');
        if ($ranking == 2 || $ranking == null){
            return redirect('/');
        }else{
       
        return view('adm.addProduct' ,[
            'sucess' => null,
             'erro' => null,
              'ranking'=> $ranking,
               'category' => $category
                ] );
    }
    }
    public function add(Request $request) {

        $category = DB::table('category')->get();
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


$product = DB::table('products')->where('product_name', $name_product)->first();

if ($product == NULL){


/// save the datas of product 
        DB::table('products')->insert(
            [
             'product_name' => $name_product,
             'product_description' => $description,
             'photo_main' => $photo_main,
             'user_id' => $request->session()->get('id_user'),
             'category_id' => $category_id,
             'value' => $value 
              ]
        );
////////////////////////////////////////////////////////

   
   
   
   
    
//// check o last id registred in database
$product = DB::table('products')->orderBy('id', 'desc')->first();
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
       DB::table('images')->insert(
        ['image' => $upload, 'product_id' => $lastProduct]
    );
    $ranking = $request->session()->get('ranking');
       
        }
        $category = DB::table('category')->limit(10)->get();
        return view('adm.addProduct', [
            'erro' => null,
            'sucess' => 'produto cadastrado com sucsso',
            'ranking'=> $ranking,
            'category' => $category
            ]);
    }else{
        $category = DB::table('category')->limit(10)->get();
        $ranking = $request->session()->get('ranking');
        return view('adm.addProduct', [
            'sucess' => null,
            'erro' => 'ops! já existe um produto com esse nome',
            'ranking'=> $ranking,
            'category' => $category
            ]);
    }

        
       
    }
}
