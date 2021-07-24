<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $category = DB::table('category')->get();
        //checks if exist a session
        $name = $request->session()->get('name');
        if ($name){
            return view('register', [ 'name' => $name,'category' => $category]);
        }else{
            return view('register', [ 'name' => null,'ranking' => null,'category' => $category]);
        }
       
    }
    
    public function registerUser( Request $request ){


        if($request->input('_token') != '' && $request->input('email') != ''){

                // rules for checks the datas from forms
            $rules = [
                'name' => 'required|min:3|max:40',
                'email' => 'email',
                'password' => 'required',
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

           $request->validate($rules, $feedback);


            // register a new user
           $register = new registerUser;

           $register->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'ranking' => 3,
                'password' => Hash::make($request->input('password'))
           ]);
           
           $request->session()->put('name', $request->input('name'));
           $request->session()->put('email', $request->input('email'));
           $request->session()->put('id_user', DB::table('users')->orderBy('id', 'desc')->first()->id);
           $request->session()->put('ranking', 3 );

            return redirect('/');
        }
    }
}
