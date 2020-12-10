<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use App\Models\Adoption;
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
                    'isowner' => $animal->isOwner(),
                    'adoptions' => $animal->adoptions()->get(),
                    'myadoption' => Adoption::where('animal_id', $animal_id)->where('user_id', Auth::id())->first()
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
                Adoption::where('animal_id', $animal_id)->forceDelete();
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

    public function adopt($animal_id){
        if($animal = Animal::find($animal_id)){
            if($animal->isOwner()){
                return redirect()->route('home')->withErrors(['Você não pode adotar o próprio animal!']);
            }else{
                $adoption = new Adoption;
                $adoption->animal_id = $animal_id;
                $adoption->user_id = Auth::id();
                $adoption->status_id = 0;
                $adoption->save();

                return redirect()->route('animalId', $animal->animal_id);
            }
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function cancelAdopt($animal_id){
        if($animal = Animal::find($animal_id)){
            Adoption::where('animal_id', $animal_id)->where('user_id', Auth::id())->forceDelete();
            return redirect()->route('animalId', $animal->animal_id);
        }else{
            return redirect()->route('home')->withErrors(['Esse animal não existe']);
        }
    }

    public function approveAdopt($adopt_id){
        if($adoption = Adoption::find($adopt_id)){
            $animal = Animal::find($adoption->animal_id);
            if($animal->isOwner()){
                $adoption->status_id = 1;
                $adoption->save();

                $animal->adopted_by = $adoption->user_id;
                $animal->save();

                Adoption::where('animal_id', $animal->animal_id)->where('user_id', '!=', $adoption->user_id)->update([
                    'status_id' => 2
                ]);

                return redirect()->route('animalId', $animal->animal_id);
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para aprovar adoções deste animal!']);
            }
        }else{
            return redirect()->back()->withErrors(['Essa adoção não existe']);
        }
    }

    public function disapproveAdopt($adopt_id){
        if($adoption = Adoption::find($adopt_id)){
            $animal = Animal::find($adoption->animal_id);
            if($animal->isOwner()){
                $adoption->status_id = 2;
                $adoption->save();

                return redirect()->route('animalId', $animal->animal_id);
            }else{
                return redirect()->route('home')->withErrors(['Você não tem permissão para aprovar adoções deste animal!']);
            }
        }else{
            return redirect()->back()->withErrors(['Essa adoção não existe']);
        }
    }
}
