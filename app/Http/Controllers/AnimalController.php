<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function show(){
        return view('animal');
    }

    public function showId($id){
        return view('single-animal', ['animal_id' => $id]);
    }
}
