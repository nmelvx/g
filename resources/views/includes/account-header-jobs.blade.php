    <div class="container border-green-bottom jobs-menu">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
            <ul class="menu-account">
                <li><a href="/lucrari-disponibile" title="Lucrari disponibile"><span class="ico ico-work"></span>Lucrari disponibile</a></li>
                <li><a href="" title="Clienti"><span class="ico ico-clients"></span>Clienti</a></li>
                <li><a href="" title="Palti"><span class="ico ico-payments"></span>Palti</a></li>
                <li><a href="/management-echipe" title="Contul meu" @if(Request::path() == 'management-echipe') class="selected" @endif><span class="ico ico-management"></span>Management echipa</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>