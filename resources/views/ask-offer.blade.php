@extends('layouts.site')

@section('content')


    <div class="container mt87">
        <div class="col-lg-3 text-center">
            <h3 class="title-section">Cere pret</h3>
            <img src="frontend/assets/images/separator2px.png" alt="" class="separator-2">
            <div class="clearfix"></div>
            <p class="info-steps"><strong>Ne pare rău, dar n-am putut calcula un preț automat :(</strong></p>
            <p class="info-steps"><small>Nu vă faceți griji, completați formularul de mai jos iar noi vă vom<br>contacta în <strong>maxim 20 minute.</strong></small></p>
        </div>
        <form action="" method="post" class="register-form">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3>Ce servicii doriti?</h3>
                    <ul>
                        <li><label><input type="checkbox" name="services[]">Tuns regulat al gazonului</label></li>
                        <li><label><input type="checkbox" name="services[]">Tuns gazon o singura data</label></li>
                        <li><label><input type="checkbox" name="services[]">Scarificare (aerare)</label></li>
                        <li><label><input type="checkbox" name="services[]">Toaletare copaci</label></li>
                    </ul>
                    <div class="border-top-2px border-bottom-2px">
                        <p><strong>Alte servicii vor fi disponibile în curând</strong></p>
                        <p>
                        * Resturile vegetale de iarbă și crengi le vom lua
                        noi!
                        <br><br>
                        * Prima întâlnire va fi cu expertul nostru; vei
                        primi sfaturi gratuite pentru grădina ta
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3>Confirmati adresa</h3>
                    <p id="geolocation-address"></p>
                    <div id="google-maps" class="no-transition"></div>
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

            google.maps.event.addListener(map,'center_changed', function() {
                //document.getElementById('default_latitude').value = map.getCenter().lat();
                //document.getElementById('default_longitude').value = map.getCenter().lng();
            });

            $('<div/>').addClass('centerMarker').appendTo(map.getDiv())
            //do something onclick
                /*
                .click(function() {
                    var that = $(this);
                    if (!that.data('win')) {
                        that.data('win', new google.maps.InfoWindow({
                            content: 'this is the center'
                        }));
                        that.data('win').bindTo('position', map, 'center');
                    }
                    that.data('win').open(map);
                });
                */
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

@endsection