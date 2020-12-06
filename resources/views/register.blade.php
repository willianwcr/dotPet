@extends('layouts.login')

@section('title', 'Cadastro')
@section('background-image', asset('/img/background-image.jpeg'))
@section('footer')
    <span>Já tem cadastro? <a href="{{ route('login.showForm') }}">Entre aqui</a></span>
@endsection

@section('form')
<form class="login-form" action="{{ route('register.do') }}" method="POST">
    @csrf
    <div class="title">
        👤 Registre-se
    </div>
    @if ($errors->all())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <div class="alert-icon">
                <i class="fas fa-times"></i>
            </div>
            {{ $error }}
        </div>
        @endforeach
    @endif
    <div class="form-input-icon">
        <i class="fas fa-user form-icon"></i>
        <input type="text" class="form-input" name="name" placeholder="Nome completo" required>
    </div>
    <div class="form-input-icon">
        <i class="fas fa-envelope form-icon"></i>
        <input type="email" class="form-input" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-input-icon">
        <i class="fas fa-birthday-cake form-icon"></i>
        <input type="text" class="form-input" name="birthday" placeholder="Data de nascimento" onfocus="(this.type='date')" required>
    </div>
    <div class="form-input-icon">
        <i class="fas fa-key form-icon"></i>
        <input type="password" class="form-input" name="password" placeholder="Senha" required>
    </div>
    <div class="form-input-icon">
        <i class="fas fa-key form-icon"></i>
        <input type="password" class="form-input" name="confirm-password" placeholder="Confirme sua senha" required>
    </div>
    <div class="form-button">
        <button class="btn btn-primary btn-lg btn-block">Cadastrar</button>
    </div>
    <div class="form-detail">
        Não é uma pessoa física? <a href="#">Cadastrar instituição</a>
    </div>
</form>
@endsection