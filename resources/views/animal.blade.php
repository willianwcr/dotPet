@extends('layouts.app')

@section('title', 'Animal')

@section('content')
    <div class="row search">
        <div class="col-12 search-header">
            <div class="background" style="background-image: url({{ asset('/img/background-image.jpeg') }})">
                <h1 class="title">Pesquise por animais</h1>
            </div>
            <form action="{{ route('search.animal') }}" method="GET">
                <div class="search-input">
                    <div class="form-input form-input-icon input-secondary">
                        <div class="form-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" class="form-input" name="q" placeholder="Pesquise por bairro, raça, porte, etc.">
                        <button class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <ul class="list">
                <span class="label">🕐 Recentes</span>
                @foreach ($lastanimals as $lastanimal)
                    <li class="list-item">
                        <a href="{{ route('animalId', $lastanimal->animal_id) }}">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">
                                @switch($lastanimal->specie_id)
                                    @case(0)
                                        🐶
                                        @break
                                    @case(1)
                                        🐱
                                        @break
                                    @default
                                        🐾
                                @endswitch {{ $lastanimal->name }}
                            </h3>
                            <span class="item-info">{{ $lastanimal->breed }} | 
                                @switch($lastanimal->gender)
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
                            <span class="item-info">{{ $lastanimal->owner()->first()->name }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
    </div>
@endsection