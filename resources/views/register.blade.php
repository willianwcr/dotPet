@extends('layouts.login')

@section('title', 'Cadastro')
@section('footer')
    <span>Já tem cadastro? <a href="{{ route('login.showForm') }}">Entre aqui</a></span>
@endsection

@section('form')
<form class="login-form" action="{{ route('login.do') }}" method="POST">
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
        <i class="fas fa-user form-icon"></i>
        <input type="email" class="form-input" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-input-icon">
        <i class="fas fa-user form-icon"></i>
        <input type="text" class="form-input" name="birthday" placeholder="Data de nascimento" required>
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
    <div class="forgot-password">
        <a href="#" class="form-link">Esqueci minha senha</a>
    </div>
</form>
@endsection