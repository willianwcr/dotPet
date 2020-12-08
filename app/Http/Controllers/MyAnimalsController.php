<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAnimalsController extends Controller
{
    public function show(){
        return view('myanimals');
    }
}
