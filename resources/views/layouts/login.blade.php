@extends('layouts.index')

@section('body')
<div class="container row">
    <div class="sidebar col-7" style="background-image: url('@yield('background-image')')">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('/img/logo-white.png') }}" alt="Logo dotpet White"></a>
        </div>
        <div class="footer-login">
            <span>Feito com 💗 por Equipe dotpet.</span>
        </div>
    </div>
    <div class="content login col-5">
        <div class="logo">
            <img src="{{ asset('/img/logo-color.png') }}" alt="Logo dotpet">
        </div>
        @yield('form')
        <div class="footer-login">
            @yield('footer')
        </div>
    </div>
</div>
@endsection