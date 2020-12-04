<div class="top-bar">
    <div class="logo">
        <img src="{{ asset('/img/logo-color.png') }}" alt="Logo dotpet">
    </div>
    <div class="desktop-menu">
        <ul class="menu">
            <li class="menu-item {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}">
                <a href="{{ route('home') }}">Início</a>
            </li>
            <li class="menu-item {{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'active' : '' }}">
                <a href="{{ route('about') }}">Sobre</a>
            </li>
            <li class="menu-item {{ (strpos(Route::currentRouteName(), 'animal') === 0) ? 'active' : '' }}">
                <a href="{{ route('animal') }}">Animais para adoção</a>
            </li>
            <li class="menu-item {{ (strpos(Route::currentRouteName(), 'institution') === 0) ? 'active' : '' }}">
                <a href="{{ route('institution') }}">Instituições</a>
            </li>
            <li class="menu-item {{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'active' : '' }}">
                <a href="{{ route('contact') }}">Contato</a>
            </li>
        </ul>
    </div>
    @auth
        Usuário logado!
    @endauth

    @guest
        <div class="actions">
            <button onclick="window.location.href = '{{ route('register.showForm') }}'" class="btn btn-primary btn-sm">Registre-se</button>
            <button onclick="window.location.href = '{{ route('login.showForm') }}'" class="btn btn-secondary btn-sm">Login</button>
        </div>
    @endguest
</div>