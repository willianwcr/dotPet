@extends('layouts.app')

@section('title', 'Pesquisar instituição')

@section('content')
    <div class="row search">
        <div class="col-12 search-header">
            <div class="background" style="background-image: url({{ asset('/img/background-image.jpeg') }})">
                <h1 class="title">Pesquise por instituições</h1>
            </div>
            <form action="{{ route('search.institution') }}" method="GET">
                <div class="search-input">
                    <div class="form-input form-input-icon input-secondary">
                        <div class="form-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" class="form-input" name="q" placeholder="Pesquise por nome, localização, etc.">
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
                @foreach ($lastinstitutions as $lastinstitution)
                    <li class="list-item">
                        <a href="{{ route('animalId', $lastinstitution->user_id) }}">
                            <img class="item-image" src="{{ asset('./img/no-photo.png') }}">
                        </a>
                        <div class="item-detail">
                            <h3 class="item-title">{{ $lastinstitution->name }}</h3>
                            @isset($lastinstitution->cidade)
                                <span class="item-info">{{ $lastinstitution->cidade }}/{{ $lastinstitution->estado }}</span>
                            @endisset
                            <span class="item-info">
                                <i class="fas fa-paw"></i> 
                                @if($lastinstitution->animals->count() > 1)
                                    {{ $lastinstitution->animals->count() }} animais
                                @elseif($lastinstitution->animals->count() == 1)
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
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
    </div>
@endsection