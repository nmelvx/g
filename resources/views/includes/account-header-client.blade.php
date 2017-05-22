    <div class="container @if(!empty($type) && $type == 'jobs')? white-bg-menu @else border-green-bottom @endif navbar-fixed-top">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
            <ul class="menu-account @if(!empty($type) && $type == 'jobs')? white @endif">
                <li><a href="/calendar" title="Lucrari disponibile" @if(Request::path() == 'calendar') class="selected" @endif><span class="ico ico-cal"></span>Calendar</a></li>
                {{--<li><a href="" title="Istoric comenzi"><span class="ico ico-ist"></span>Comenzi</a></li>--}}
                {{--<li><a href="" title="Servicii gratuite"><span class="ico ico-serv"></span>Serivicii</a></li>--}}
                <li><a href="/contul-meu" title="Contul meu" @if(Request::path() == 'contul-meu') class="selected" @endif><span class="ico ico-acc"></span>Contul meu</a></li>
                {{--<li><a href="" title="Suport"><span class="ico ico-sup"></span>Suport</a></li>--}}
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>