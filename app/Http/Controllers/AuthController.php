<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

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

        //dd($request);

        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users', 'max:255'],
            'birthday' => ['required', 'max:255'],
            'password' => ['required', 'max:255']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'type' => 0,
            'password' => bcrypt($validatedData['password']),
            'birthday' => Carbon::createFromFormat('Y-m-d', $validatedData['birthday'])
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ])){
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['Erro no cadastro']);
    }

    public function showInstitutionRegisterForm(){
        if(Auth::check() === true){
            return redirect()->route('home');
        }
        return view('register-institution');
    }

    public function doInstitutionRegister(Request $request){

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'cnpj' => $request['cnpj'],
            'type' => 1,
            'password' => bcrypt($request['password'])
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])){
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['Erro no cadastro']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
