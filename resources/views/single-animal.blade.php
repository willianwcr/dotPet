@extends('layouts.app')

@section('title', 'Animal')

@section('content')
    <div class="row animal">
        <div class="col-4">
            <h2 class="title">Informações</h2>
            <div class="card align-center">
                <div class="cover" style="background-image: url('{{ asset('./img/no-photo.png') }}')">
                </div>
                <div class="profile-picture">
                    <img src="{{ asset('./img/no-photo.png') }}">
                </div>
                <div class="detail">
                    <h1 class="title">🐶 {{ $animal->name }} <span class="badge secondary">Disponível</span></h1>
                    <span class="info">{{ $animal->breed }} | 3 anos | ♀️ Fêmea</span>
                </div>
                <div class="short-bio">
                    {{ $animal->short_bio }}
                </div>
                <button class="btn btn-block btn-large btn-secondary action">Compartilhar</button>
                <button class="btn btn-block btn-large btn-primary action">Adotar</button>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-7">
                    <h2 class="title">Biografia</h2>
                    <div class="card">
                        <p class="biografia">A pretinha é uma cachorrinha muito dócil. Ela tem 3 anos de idade, é muito brincalhona. Atualmente, está com as vacinas em dia. Deixo para adoção, porque infelizmente eu não posso dar mais conta de cuidar dela visto que a minha família aumentou bastante, gerando muitos custos para meu lar.</p>
                    </div>
                </div>
                <div class="col-5">
                    <h2 class="title">Doador</h2>
                    <div class="card">
                        <div class="owner">
                            <div class="image">
                                <img src="{{ asset('./img/no-photo.png') }}">
                            </div>
                            <div class="details">
                                <span class="name">{{ $owner->name }}</span>
                                <span class="info">{{ $owner->age }} anos | Manaus/AM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Galeria</h2>
                    <div class="card">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection