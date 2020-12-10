<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use Carbon\Carbon;

class AnimalController extends Controller
{
    public function show(){
        return view('animal');
    }

    public function showId($id){
        if($animal = Animal::find($id)){
            return view('single-animal', [
                'animal' => $animal,
                'owner' => $animal->owner()->first()
            ]);
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public static function doRegister(Request $request){
        $animal = Animal::create([
            'name' => $request['name'],
            'gender' => $request['gender'],
            'specie_id' => $request['specie'],
            'breed' => $request['breed'],
            'birthday' => Carbon::createFromFormat('Y-m-d', $request['birthday']),
            'short_bio' => $request['short-bio'],
            'published' => 0,
            'views' => 0,
            'owner' => Auth::id(),
        ]);

        return redirect()->route('animalId', $animal->animal_id);
    }
}
