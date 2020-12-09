@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <div class="home row">
        <div class="herobanner col-7">
            <h1>Adotar é amar em dobro 💗🐾</h1>
            <div class="form-input form-input-icon input-secondary">
                <div class="form-icon">
                    <i class="fas fa-search"></i>
                </div>
                <input type="email" class="form-input" name="email" placeholder="Pesquise por bairro, raça, porte, etc.">
                <button class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div class="image col-5" style="background-image: url({{ asset('./img/pulgas.jpg') }})">
        </div>
    </div>
@endsection