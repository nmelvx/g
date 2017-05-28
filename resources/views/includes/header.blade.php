    <div class="container-fluid header-menu {!! (isset($class) && !empty($class))?$class:'white' !!} navbar-fixed-top">
        <div class="container">
            <a href="{{ route('home') }}" title="Logo Gardinero" class="logo-header"><img src="frontend/assets/images/logo-gardinero-{!! (isset($class) && !empty($class))?'white':'green' !!}.png" alt="Logo Gardinero"></a>
            <ul>
                <li><a href="/servicii" title="Servicii">Servicii</a></li>
                <li><a href="/preturi" title="Preturi">Preturi</a></li>
                <li><a href="/de-ce-noi" title="De ce noi">De ce noi</a></li>
                <li><a href="/intrebari" title="Intrebari">Intrebari</a></li>
            </ul>
            @if(Auth::user())
                <div class="user-info-logged">Salut, <a href="{{ route('contul-meu.index') }}">{{ Auth::user()->firstname }}</a></div>
            @else
                <a href="{{ route('login') }}" title="Login" class="login-btn show-popup" data-popup="login">Login</a>
            @endif
            <a href="tel:0745.123.456" class="base-phone">0745.123.456</a>
        </div>
    </div>

    @if(Helper::userHasAddress(Auth::user()) == false)
        <div class="container-fluid no-address">
            Pentru a putea plasa o comanda completati adresa in contul dumneavoastra. Apasa <a href="{{ route('contul-meu.index') }}">aici</a> pentru a intra in contul tau.
        </div>
    @endif
