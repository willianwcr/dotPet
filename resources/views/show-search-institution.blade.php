@extends('layouts.app')

@section('title', 'Instituição')

@section('content')
    <form action="{{ route('search.institution') }}" method="GET">
        <div class="row search-bar">
            <div class="col-4">
                <span class="label">Pesquisa de Instituições</span>
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
                @if($searchInstitutions->count() == 0)
                    <br><i>Nenhuma instituição encontrado</i>
                @endif
                @foreach ($searchInstitutions as $institution)
                    <li class="list-item">
                        <a href="{{ route('animalId', $institution->user_id) }}">
                            <img class="item-image img-lg" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">{{ $institution->name }}</h3>
                            @isset($institution->cidade)
                                <span class="item-info">{{ $institution->cidade }}/{{ $institution->estado }}</span>
                            @endisset
                            <span class="item-info">
                                <i class="fas fa-paw"></i> 
                                @if($institution->animals->count() > 1)
                                    {{ $institution->animals->count() }} animais
                                @elseif($institution->animals->count() == 1)
                                    1 animal
                                @else
                                    Nenhum animal
                                @endif
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection