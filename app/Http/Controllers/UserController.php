<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        if($request->session()->get('ranking') == 1){

            $ranking = $request
            ->session()
            ->get('ranking');
            
            $category = Category::select('category_name')
                ->limit(10)
                ->get();

                $user = User::select('id','name','email','ranking')->orderBy('ranking','asc')->get();

        return view('adm.manangerUser', [
            'category' => $category,
            'user' => $user,
            'ranking'=> $ranking
            ]);
        }else{
            return redirect('/profile');
        }

    }

    public function edit($id, Request $request){

        $category = Category::select('category_name')
                ->limit(10)
                ->get();

            $ranking = $request
            ->session()
            ->get('ranking');

        $user = User::where('id', $id)->first();


        return view('adm.editUser', [
            'category' => $category,
            'user' => $user,
            'ranking' => $ranking
            ]);

    }



    public function update(Request $request){
var_dump('teste');
        $ranking = $request
            ->session()
            ->get('ranking');

            if ($ranking == 1){
                $id = $request->input('id');
                User::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'ranking' => $request->input('ranking'),
                    
                ]);
            }

    }
}
