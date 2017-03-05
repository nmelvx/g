    <div class="container-fluid header-menu green navbar-fixed-top">
        <div class="container">
            <a href="" title="Logo Gardinero" class="logo-header"><img src="frontend/assets/images/logo-gardinero-white.png" alt="Logo Gardinero"></a>
            <ul>
                <li><a href="" title="Servicii">Servicii</a></li>
                <li><a href="" title="Preturi">Preturi</a></li>
                <li><a href="" title="De ce noi">De ce noi</a></li>
                <li><a href="" title="Intrebari">Intrebari</a></li>
            </ul>
            @if(Auth::user())
                <div class="user-info-logged">Salut, {{ Auth::user()->firstname }}</div>
            @else
                <a href="" title="Login" class="login-btn">Login</a>
            @endif
            <a href="tel:0745.123.456" class="base-phone">0745.123.456</a>
        </div>
    </div>