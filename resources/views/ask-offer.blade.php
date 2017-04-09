@extends('layouts.site')

@section('content')


    <div class="container mt87">
        <div class="col-lg-3 text-center">
            <h3 class="title-section">Cere oferta</h3>
            <img src="frontend/assets/images/separator2px.png" alt="" class="separator-2">
            <div class="clearfix"></div>
            <p class="info-steps"><strong>Ne pare rău, dar n-am putut calcula un preț automat :(</strong></p>
            <p class="info-steps"><small>Nu vă faceți griji, completați formularul de mai jos iar noi vă vom<br>contacta în <strong>maxim 20 minute.</strong></small></p>
        </div>
        <form action="{{ route('calendar.offers') }}" method="post" class="offer-form">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3><span>1.</span>Ce servicii doriti?</h3>
                    <ul class="chk-list">
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Tuns regulat al gazonului</label></li>
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Tuns gazon o singura data</label></li>
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Scarificare <em>(aerare)</em></label></li>
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Toaletare copaci</label></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="border-top-2px border-bottom-2px">
                        <p><strong>Alte servicii vor fi disponibile în curând</strong></p>
                        <p>* Resturile vegetale de iarbă și crengi le vom luanoi!</p>
                        <p>* Prima întâlnire va fi cu expertul nostru; vei primi sfaturi gratuite pentru grădina ta</p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3><span>2.</span>Confirmati adresa</h3>
                    <p id="geolocation-address"></p>
                    <div id="google-maps" class="no-transition"></div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3><span>3.</span>Cum te putem contacta?</h3>
                    <input type="text" placeholder="Prenume" name="prenume">
                    <input type="text" placeholder="Nume" name="Nume">
                    <input type="text" placeholder="Email" name="email">
                    <input type="text" placeholder="Telefon" name="telefon">
                    <div class="clearfix"></div>
                    <div class="border-bottom-2px">
                        <p>* Este posibil să folosim numărul dumneavoastră de telefon pentru a vă contacta</p>
                    </div>
                </div>
            </div>
            <div class="row mb20">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                    <a href="" class="submit-btn custom-center">Cere oferta</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('javascripts')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0"></script>

    <script type="text/javascript">

        function initialize() {

            var mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(44.4268, 26.1025),
                //styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                styles:[{"featureType":"all","stylers":[{"saturation":0},{"hue":"#e7ecf0"}]},{"featureType":"road","stylers":[{"saturation":-70}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"simplified"},{"saturation":-60}]}]
            };
            map = new google.maps.Map(document.getElementById('google-maps'), mapOptions);

            google.maps.event.addListener(map,'dragend', function() {

                var pos = {
                    lat: map.getCenter().lat(),
                    lng: map.getCenter().lng()
                };
                var geocoder = new google.maps.Geocoder;

                geocoder.geocode({'location': pos}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            $('#geolocation-address').text(results[0].formatted_address);
                        } else {
                            console.log('No results found');
                        }
                    } else {
                        console.log('Geocoder failed due to: ' + status);
                    }
                });
            });

            $('<div/>').addClass('centerMarker').appendTo(map.getDiv())

        }

        google.maps.event.addDomListener(window, 'load', initialize);

        $(document).ready(function(){
            $('.submit-btn').click(function(e){
                e.preventDefault();
                window.location = '/calendar'
            });
        });

    </script>

@endsection