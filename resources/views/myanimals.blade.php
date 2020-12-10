@extends('layouts.app')

@section('title', 'Meus animais')

@section('content')
    <div class="row myanimals">
        <div class="col-12">
            <h2 class="title">Meus animais</h2>
            <div class="card full-height">
                <ul class="list">
                    @foreach ($myanimals as $myanimal)
                        <li class="list-item">
                            <a href="{{ route('animalId', $myanimal->animal_id) }}">
                                <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                            </a>
                            <div class="item-detail">
                                <h3 class="item-title">
                                    @switch($myanimal->specie_id)
                                        @case(0)
                                            🐶
                                            @break
                                        @case(1)
                                            🐱
                                            @break
                                        @default
                                            🐾
                                    @endswitch {{ $myanimal->name }}
                                </h3>
                                <span class="item-info">{{ $myanimal->breed }} | 
                                    @switch($myanimal->gender)
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
                                <div class="item-analytics">
                                    <div class="data">
                                        <i class="fas fa-eye"></i>
                                        {{ $myanimal->views }}
                                    </div>
                                    <div class="data">
                                        <i class="fas fa-user-alt"></i>
                                        {{ $myanimal->adoptions->count() }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection