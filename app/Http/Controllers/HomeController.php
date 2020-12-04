<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showHome(){
        if(Auth::check() === true){
            return view('dashboard');
        }
        return view('home');
    }
}
