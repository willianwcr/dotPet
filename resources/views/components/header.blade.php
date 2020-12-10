<div class="header">
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('/img/logo-color.png') }}" alt="Logo dotpet"></a>
    </div>
    <div class="desktop-menu">
        <ul class="nav">
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'home') === 0) || (strpos(Route::currentRouteName(), 'dashboard') === 0) ? 'active' : '' }}">
                <a href="{{ route('home') }}">Início</a>
            </li>
            @guest
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'about') === 0) ? 'active' : '' }}">
                <a href="{{ route('about') }}">Sobre</a>
            </li>
            @endguest
            @auth
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'myanimals') === 0) ? 'active' : '' }}">
                <a href="{{ route('myanimals') }}">Meus animais</a>
            </li>
            @endauth
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'animal') === 0) ? 'active' : '' }}">
                <a href="{{ route('animal') }}">Animais para adoção</a>
            </li>
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'institution') === 0) ? 'active' : '' }}">
                <a href="{{ route('institution') }}">Instituições</a>
            </li>
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'contact') === 0) ? 'active' : '' }}">
                <a href="{{ route('contact') }}">Contato</a>
            </li>
        </ul>
    </div>
    @auth
        <div class="logged-user">
            <div class="details">
                <span class="name">{{ Auth::user()->name }}</span>
                <span class="type">
                    @switch(Auth::user()->type)
                        @case(0)
                            Pessoa física
                            @break
                        @case(1)
                            Instituição
                            @break
                        @case(2)
                            Administrador
                            @break
                        @default
                            Usuário
                    @endswitch
                </span>
            </div>
            <div class="image"> 
                <img class="profile-picture" src="{{ asset('./img/no-photo.png') }}">
            </div>
        </div>
        <div class="actions">
            <button class="btn btn-options" onclick="toggleMenu('user-dropdown-menu');"><i class="fas fa-chevron-down"></i></button>
            <div class="dropdown" id="user-dropdown-menu">
                <ul class="menu-dropdown">
                    <a href="#">
                        <li class="menu-dropdown-item">
                            👤 Minha conta
                        </li>
                    </a>
                    <a href="#">
                        <li class="menu-dropdown-item">
                            🔧 Suporte
                        </li>
                    </a>
                    <a href="{{ route('logout') }}">
                        <li class="menu-dropdown-item">
                            🚪 Finalizar sessão
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    @endauth

    @guest
        <div class="actions">
            <button onclick="window.location.href = '{{ route('register.showForm') }}'" class="btn btn-primary btn-sm">Registre-se</button>
            <button onclick="window.location.href = '{{ route('login.showForm') }}'" class="btn btn-secondary btn-sm">Login</button>
        </div>
    @endguest
</div>

<script>
    let toggleMenu = (id) => {
        var x = document.getElementById(id);
        if (x.style.display === "none" || x.style.display === "") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>