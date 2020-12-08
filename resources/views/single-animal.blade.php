@extends('layouts.app')

@section('title', 'Animal')

@section('content')
    <div class="row animal">
        <div class="col-4">
            <h2 class="title">Informações</h2>
            <div class="card">
                <div class="cover">
                    <img src="{{ asset('./img/no-photo.png') }}">
                </div>
                <div class="profile-picture">
                    <img src="{{ asset('./img/no-photo.png') }}">
                </div>
                <div class="detail">
                    <h1 class="title">🐶 Pretinha <span class="badge">Disponível</span></h1>
                    <span class="info">Vira-lata | 3 anos | ♀️ Fêmea</span>
                </div>
                <div class="short-bio">
                    A pretinha é uma cachorrinha muito dócil. Ela tem 3 anos de idade, é muito brincalhona.
                </div>
                <button class="btn btn-block btn-large btn-secondary action">Compartilhar</button>
                <button class="btn btn-block btn-large btn-primary action">Adotar</button>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-8">
                    <h2 class="title">Biografia</h2>
                    <div class="card">

                    </div>
                </div>
                <div class="col-4">
                    <h2 class="title">Doador</h2>
                    <div class="card">
                        
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