<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(Request $request){
        $ranking = $request->session()->get('ranking');
        $name = $request->session()->get('name');
        $email = $request->session()->get('email');

      
        $profile = User::where('email', '=', $email)->first();
        
        if($name){

         
            $category = Category::select('category_name')
            ->limit(10)
            ->get();



            return view('profile', [ 'category' => $category, 'ranking' => $ranking, 'profile' => $profile]);
        }else{
            return redirect('/login');
        }
     
        
    }
}
