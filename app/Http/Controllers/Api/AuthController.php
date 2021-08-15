<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user  = User::where('email', $request->email)->first();
        $id = $user->id;
        $ranking= $user->ranking;
var_dump($user->id);
        return $this->respondWithToken($token, $id, $ranking);
    }

    protected function respondWithToken($token,$id, $ranking)
    {

        
        return response()->json([

            'access_token' => $token,
            'ranking'=> $ranking,
            'id' => $id,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $ranking = $request->input('ranking');
        $password = $request->input('password');
        
    
        
    
        User::create([
            'name' => $name,
             'email' => $email,
             'password' => Hash::make($password),
             'ranking' => $ranking
        ]);
    }

}
