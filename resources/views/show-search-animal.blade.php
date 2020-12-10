@extends('layouts.app')

@section('title', 'Animal')

@section('content')
    <form action="{{ route('search.animal') }}" method="GET">
        <div class="row search-bar">
            <div class="col-4">
                <span class="label">Pesquisa de Animais</span>
                <div class="form-input form-input-icon input-secondary">
                    <div class="form-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" class="form-input" name="q" placeholder="Pesquise por bairro, raça, porte, etc.">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            <!--
            <div class="col-2">
                <span class="label">Espécie</span>
                <div class="form-justify">
                    <div class="form-check form-check-icon">
                        <input type="radio" class="form-check-input" name="specie" id="specie-option-1" value="0">
                        <label class="check-icon" for="specie-option-1">
                            🐶
                        </label>
                    </div>
                    <div class="form-check form-check-icon">
                        <input type="radio" class="form-check-input" name="specie" id="specie-option-2" value="1">
                        <label class="check-icon" for="specie-option-2">
                            🐱
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <span class="label">Sexo</span>
                <div class="form-justify">
                    <div class="form-check form-check-icon">
                        <input type="radio" class="form-check-input" name="gender" id="gender-option-1" value="0">
                        <label class="check-icon" for="gender-option-1">
                            <i class="fas fa-venus"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-icon">
                        <input type="radio" class="form-check-input" name="gender" id="gender-option-2" value="1">
                        <label class="check-icon" for="gender-option-2">
                            <i class="fas fa-mars"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-4">

            </div>
            -->
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <ul class="list">
                <span class="label">Resultados da pesquisa</span>
                @if($searchAnimals->count() == 0)
                    <br><i>Nenhum animal encontrado</i>
                @endif
                @foreach ($searchAnimals as $animal)
                    <li class="list-item">
                        <a href="{{ route('animalId', $animal->animal_id) }}">
                            <img class="item-image img-lg" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title title-lg">
                                @switch($animal->specie_id)
                                    @case(0)
                                        🐶
                                        @break
                                    @case(1)
                                        🐱
                                        @break
                                    @default
                                        🐾
                                @endswitch {{ $animal->name }}
                            </h3>
                            <span class="item-info">{{ $animal->breed }} | 
                                @switch($animal->gender)
                                    @case(0)
                                        <i class="fas fa-venus"></i> Fêmea
                                        @break
                                    @case(1)
                                        <i class="fas fa-mars"></i> Macho
                                        @break
                                    @default
                                        Sem gênero definido
                                @endswitch
                            </span>
                            <span class="item-info">{{ $animal->owner()->first()->name }}</span>
                            <span class="item-short-bio">{{ $animal->short_bio }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection