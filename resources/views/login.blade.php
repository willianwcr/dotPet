@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container row">
    <div class="sidebar col-7" style="background-image: url('{{ asset('/img/background-image.jpeg') }}')">
        <div class="logo">
            <img src="{{ asset('/img/logo-white.png') }}" alt="Logo dotpet White">
        </div>
        <div class="footer">
            <span>Feito com 💗 por Equipe dotpet.</span>
        </div>
    </div>
    <div class="content col-5">
        <div class="logo">
            <img src="{{ asset('/img/logo-color.png') }}" alt="Logo dotpet White">
        </div>
        <form class="login-form" action="{{ route('login.do') }}" method="POST">
            @csrf
            <div class="title">
                🐶 Login
            </div>
            <!-- CRIAR NOTIFICAÇÃO DE ERRO CASO OCORRA -->
            <div class="form-input-icon">
                <i class="fas fa-user form-icon"></i>
                <input type="email" class="form-input" name="email" placeholder="E-mail">
            </div>
            <div class="form-input-icon">
                <i class="fas fa-key form-icon"></i>
                <input type="password" class="form-input" name="password" placeholder="Senha">
            </div>
            <div class="form-button">
                <button class="btn btn-primary btn-lg btn-block">Entrar</button>
            </div>
            <div class="forgot-password">
                <a href="#" class="form-link">Esqueci minha senha</a>
            </div>
        </form>
        <div class="footer">
            <span>Não tem cadastro ainda? <a href="#">Registre-se aqui</a></span>
        </div>
    </div>
</div>
@endsection