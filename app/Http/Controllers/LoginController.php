<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
       
        $name = $request->session()->get('name');

        //checks if exist a session
        if ($name){
            return view('login', [ 'name' => $name, 'email' => null,  'password' => null] );
        }else{
            return view('login', [ 'name' => null, 'email' => null,  'password' => null]);
        }
    }

public function authentication(Request $request){


    // rules for checks the datas from forms

    $rules = [
        'email' => 'email',
        'password' => 'required'
    ];

    
    $feedback = [
        'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
        'password.required' => 'O campo senha é obrigatório'
    ];

    
    $request->validate($rules, $feedback);





    // get datas from forms
    $email = $request->get('email');
    $password = $request->get('password');

    

   // search the datas from database
    $user = new User();
    $user = $user->where('email', $email)->get()->first();
        $userPassword = $user->password;
        $userName = $user->name;
        $userEmail = $user->email;


        // checks the password
    if (Hash::check($password, $userPassword)) {

        $request->session()->put('email', $request->input('email'));
        $request->session()->put('name', $userName);

        return redirect('/');

    }else{
        return view('login', [ 'name' => null, 'email' => $email,  'password' => $password]);
    }
   

}



}