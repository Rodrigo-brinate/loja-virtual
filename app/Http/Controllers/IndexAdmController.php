<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexAdmController extends Controller
{
    public function index(){
        return view('indexAdm');
    }
}
