<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;

class SearchController extends Controller
{
    public function showSearchAnimal(){
        $lastanimals = Animal::where('published', 1)->limit(5)->orderByDesc('created_at')->get();
        return view('animal', [
            'lastanimals' => $lastanimals
        ]);
    }

    public function searchAnimal(Request $request){
        $searchAnimals = Animal::where('name', 'like', '%'. $request['q'] .'%')->limit(10)->get();
        return view('show-search-animal', [
            'searchAnimals' => $searchAnimals
        ]);
    }

    public function showSearchInstitution(){
        $lastinstitutions = User::where('type', 1)->limit(5)->orderByDesc('created_at')->get();
        return view('institution', [
            'lastinstitutions' => $lastinstitutions
        ]);
    }

    public function searchInstitution(Request $request){
        $searchInstitutions = User::where('name', 'like', '%'. $request['q'] .'%')->limit(10)->get();
        return view('show-search-institution', [
            'searchInstitutions' => $searchInstitutions
        ]);
    }
}
