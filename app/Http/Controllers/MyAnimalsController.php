<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MyAnimalsController extends Controller
{
    public function show(){
        $myanimals = User::find(Auth::id())->animals;
        return view('myanimals', [
            'myanimals' => $myanimals
        ]);
    }
}
