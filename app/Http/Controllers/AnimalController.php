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

    public function showId($animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->published || $animal->isOwner()){
                return view('single-animal', [
                    'animal' => $animal,
                    'owner' => $animal->owner()->first(),
                    'isowner' => $animal->isOwner()
                ]);
            }else{
                return redirect()->route('home')->withErrors(['Esse animal não existe']);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function doRegister(Request $request){
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

    public function publish($animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->isOwner()){
                $animal->published = true;
                $animal->save();
                return redirect()->route('animalId', $animal->animal_id);
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para alterar esse animal!']);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function unpublish($animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->isOwner()){
                $animal->published = false;
                $animal->save();
                return redirect()->route('animalId', $animal->animal_id);
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para alterar esse animal!']);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function delete($animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->isOwner()){
                $animal->forceDelete();
                return redirect()->route('home');
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para alterar esse animal!']);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function update(Request $request, $animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->isOwner()){
                $animal->name = $request['name'];
                $animal->gender = $request['gender'];
                $animal->specie_id = $request['specie'];
                $animal->breed = $request['breed'];
                $animal->birthday = $request['birthday'];
                $animal->short_bio = $request['short-bio'];
                $animal->save();

                return redirect()->route('animalId', $animal->animal_id);
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para alterar esse animal!']);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function updateBio(Request $request, $animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->isOwner()){
                $animal->bio = $request['bio'];
                $animal->save();

                return redirect()->route('animalId', $animal->animal_id);
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para alterar esse animal!']);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }
}
