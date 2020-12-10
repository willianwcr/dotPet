<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use App\Models\User;

class DashboardController extends Controller
{
    public function show(){
        if(Auth::check() === true){
            $user = User::find(Auth::id());
            return view('dashboard')->with([
                'myanimals' => $user->animals()->get(),
                'myadoptions' => $user->adoptions()->get()
            ]);
        }
        return redirect()->route('home');
    }

    public function getMyAnimals(){
        return Animal::where('owner', Auth::id())->get();
    }
}
