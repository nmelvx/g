@extends('layouts.default')

@section('content')
    <div class="container pt100">
        <div class="row display-table">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 table-cell">
                <div class="boxed my-calendar">
                    <h3 class="box-title">Calendar<br>Gazon</h3>
                    <p>Urmatoarea programare este pe data de 19 septembrie ora 13:00.</p>
                    <a href="" class="button-custom see-prog-details">Vezi detalii</a>
                    <p>Acceseaza calendarul și cheamă o echipă</p>
                    <a href="" title="Intră în calendar" class="button-custom check-calendar">Intră în calendar</a>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 table-cell">
                <div class="boxed my-account">
                    <h3 class="box-title">Datele<br>tale</h3>
                    <form action="" method="post" autocomplete="off">
                        <div class="form-input-box">
                            <label>Prenume</label>
                            <input type="text" name="firstname" value="{{ Auth::user()->firstname }}" placeholder="Marius" class="input-custom">
                        </div>
                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Nume</label>
                            <input type="text" name="lastname" value="{{ Auth::user()->lastname }}" placeholder="Neacsu" class="input-custom">
                        </div>
                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Telefon</label>
                            <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="0722000123" class="input-custom">
                        </div>
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" placeholder="myemail@email.com" class="input-custom">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Parola</label>
                            <input type="password" name="password" autocomplete="off" placeholder="Parola" class="input-custom">
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Confirma parola</label>
                            <input type="password" name="confirm_password" autocomplete="off" placeholder="Confirma parola" class="input-custom">
                        </div>
                        @if ($errors->has('confirm_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('confirm_password') }}</strong>
                            </span>
                        @endif
                        <button class="button-custom yellow">Actualizeaza cont</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 table-cell">
                <div class="boxed my-address">
                    <h3 class="box-title">Adresa<br>ta</h3>
                    <p>Str. Iancu Nicolae, Nr. 53, Pipera, Ilfov</p>
                    <div class="google-map-address">
                        <div class="gmap"></div>
                        <button class="button-custom green">Schimba adresa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row display-table">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 table-cell">
                <div class="boxed my-financial">
                    <h3 class="box-title">Datele tale<br>financiare</h3>
                    <form action="" method="post">
                        <div class="form-input-box">
                            <label>Numar card</label>
                            <input type="text" placeholder="4200 0000 0000 6000" name="card" class="input-custom card">
                        </div>
                        @if ($errors->has('card'))
                            <span class="help-block">
                                <strong>{{ $errors->first('card') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Data expirare</label>
                            <input type="text" placeholder="08/2017" class="input-custom date-expire">
                        </div>
                        <div class="form-input-box">
                            <label>CVC</label>
                            <input type="text" placeholder="123" class="input-custom cvc">
                        </div>
                        <button class="button-custom purple">Salveaza</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 table-cell">
                <div class="boxed my-win">
                    <h3 class="box-title">Câștigă<br>100 lei</h3>
                    <p>Trimite linkul tau la 2 prieteni si castiga servicii in valoare de 100 de lei</p>
                    <a href="" class="post-link post-fb">Posteaza pe Facebook</a>
                    <a href="" class="post-link post-tw">Posteaza pe Twitter</a>
                    <a href="" class="post-link post-gp">Posteaza pe Google+</a>
                    <p>Prieteni înscriși: 1/2</p>
                </div>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 table-cell">
                <div class="boxed my-oppinion">
                    <h3 class="box-title">Părerea ta<br>contează</h3>
                    <p>Zi-ne cum ti se par serviciile noastre si ce putem imbunatati:</p>
                    <form action="" method="post">
                        <textarea rows="5" cols="20" class="textarea-custom"></textarea>
                        <button class="button-custom orange">Trimite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0&callback=initMap"></script>

    <script type="text/javascript">

        var geocoder, infoWindow, map, pos;
        function initMap() {
            map = new google.maps.Map(document.getElementById('gmap'), {
                center: {lat: 44.4268, lng: 26.1025},
                zoom: 14,
                styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
            });

            geocoder = new google.maps.Geocoder;
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    geocoder.geocode({'location': pos}, function (results, status) {
                        if (status === 'OK') {
                            if (results[1]) {
                                new google.maps.Marker({
                                    position: pos,
                                    icon: 'assets/images/pin.png',
                                    map: map
                                });
                                $('#geolocation-address').text(results[1].formatted_address);
                            } else {
                                window.alert('No results found');
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status);
                        }
                    });

                    map.setCenter(pos);

                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }



        $(document).ready(function() {
            initMap();

            /** disable inputs autocomplete **/
            if (document.getElementsByTagName)
            {
                var inputElements = document.getElementsByTagName('input');

                for (var i=0; inputElements[i]; i++)
                {
                    if (inputElements[i].className && (inputElements[i].className.indexOf('disableAutoComplete') != -1))
                    {
                        inputElements[i].setAttribute('autocomplete', 'off');
                    }
                }
            }
        });
    </script>

@endsection