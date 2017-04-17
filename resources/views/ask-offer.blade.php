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
        <form action="{{ route('calendar.offers') }}" method="POST" class="offer-form">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3><span>1.</span>Ce servicii doriti?</h3>
                    <ul class="chk-list">
                        @foreach($services as $k => $service)
                        <li><label class="checkbox-custom">{{ Form::checkbox('services[]', $service->id, false) }}<span></span>{{ $service->title }}</label></li>
                        @endforeach
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
                    <p id="geolocation-address">{{ Input::get('address') }}</p>
                    <div id="google-maps" class="no-transition"></div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3">
                    <h3><span>3.</span>Cum te putem contacta?</h3>
                    <div class="line-input">
                    {{ Form::text('firstname', explode(' ', Input::get('fullname'))[0], array('placeholder' => 'Prenume')) }}
                    </div>
                    <div class="line-input">
                    {{ Form::text('lastname', explode(' ', Input::get('fullname'))[1], array('placeholder' => 'Nume')) }}
                    </div>
                    <div class="line-input">
                    {{ Form::text('email', '', array('placeholder' => 'Email')) }}
                    </div>
                    <div class="line-input">
                    {{ Form::text('phone', Input::get('phone'), array('placeholder' => 'Telefon')) }}
                    </div>
                    {{ Form::hidden('address', Input::get('address')) }}
                    {{ Form::hidden('unique_id', Input::get('unique_id')) }}
                    {{ csrf_field() }}
                    <div class="clearfix"></div>
                    <div class="border-bottom-2px">
                        <p>* Este posibil să folosim numărul dumneavoastră de telefon pentru a vă contacta</p>
                    </div>
                </div>
            </div>
            <div class="row mb20">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                    <button class="submit-btn custom-center">Cere oferta</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('javascripts')

    {{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0') }}
    {{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
    {{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}

    <script type="text/javascript">

        function initialize() {

            var mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(44.4268, 26.1025),
                //styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                styles:[{"featureType":"all","stylers":[{"saturation":0},{"hue":"#e7ecf0"}]},{"featureType":"road","stylers":[{"saturation":-70}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"simplified"},{"saturation":-60}]}]
            };
            var map = new google.maps.Map(document.getElementById('google-maps'), mapOptions);

            $.get( "https://maps.googleapis.com/maps/api/geocode/json?address={{ Input::get('address') }}&key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0", function( data ) {
                map.panTo(new google.maps.LatLng(data.results[0].geometry.location.lat, data.results[0].geometry.location.lng));
            });

            google.maps.event.addListener(map, 'dragend', function() {

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


            $('.offer-form').validate({
                rules: {
                    address: "required",
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        min: 10
                    }
                },
                messages: {
                    phone: {
                        number: "Introduceti un numar de telefon valid."
                    }
                },
                submitHandler : function(form) {
                    form.submit();
                }
            });


        });

    </script>

@endsection