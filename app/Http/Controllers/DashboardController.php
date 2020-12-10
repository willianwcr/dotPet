<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;

class DashboardController extends Controller
{
    public function show(){
        if(Auth::check() === true){
            $myanimals = self::getMyAnimals();
            return view('dashboard')->with(['myanimals'=>$myanimals]);
        }
        return redirect()->route('home');
    }

    public function getMyAnimals(){
        return Animal::where('owner', Auth::id())->get();
    }
}
