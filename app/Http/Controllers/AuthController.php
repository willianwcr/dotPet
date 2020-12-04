<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        if(Auth::check() === true){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function doLogin(Request $request){
        var_dump($request->all());

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }

        return redirect()->back()->withInput()->withErrors(['E-mail ou senha inválidos!']);
    }

    public function showRegisterForm(){
        if(Auth::check() === true){
            return redirect()->route('home');
        }
        return view('register');
    }

    public function doRegister(Request $request){
        return true;
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.showForm');
    }
}
