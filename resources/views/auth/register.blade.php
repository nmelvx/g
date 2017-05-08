@extends('layouts.app')

@section('content')

<div class="container mt100">
    <div class="col-lg-3 text-center">
        <h3 class="title-section">Creează cont</h3>

        <img src="frontend/assets/images/separator2px.png" alt="" class="separator-2">
        <div class="clearfix"></div>
        <p class="info-register">completează câmpurile de mai jos:</p>
    </div>
    <form class="register-form" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="col-50">
            <h3 class="title-green">1. Datele tale</h3>
            <input type="text" placeholder="Prenume" value="{{ Input::old('firstname') }}" name="firstname">
            @if ($errors->has('firstname'))
                <label class="error">{{ $errors->first('firstname') }}</label>
            @endif
            <input type="text" placeholder="Nume" value="{{ Input::old('lastname') }}" name="lastname">
            @if ($errors->has('lastname'))
                <label class="error">{{ $errors->first('lastname') }}</label>
            @endif
            <input type="text" placeholder="Email" value="{{ Input::old('email') }}" name="email">
            @if ($errors->has('email'))
                <label class="error">{{ $errors->first('email') }}</label>
            @endif
            <input type="text" placeholder="Telefon" value="{{ Input::old('phone') }}" name="phone">
            @if ($errors->has('phone'))
                <label class="error">{{ $errors->first('phone') }}</label>
            @endif
            <input type="password" placeholder="Parola" name="password">
            @if ($errors->has('password'))
                <label class="error">{{ $errors->first('password') }}</label>
            @endif
            <input type="password" placeholder="Repeta parola" name="password_confirmation">
        </div>
        <div class="col-50 address-box">
            <h3 class="title-green">2. Adresa ta</h3>
            <p id="geolocation-address" style="display: block;">Selecteaza pe harta adresa ta:</p>
            <div id="gmap" class="no-transition"></div>
            <p>sau introdu manual adresa</p>
            <input type="text" placeholder="Adresa ta" value="{{ old('address') }}" id="geolocation-address-input" name="address">
            {{ Form::hidden('latitude', '', ['class' => 'latitude']) }}
            {{ Form::hidden('longitude', '', ['class' => 'longitude']) }}
            @if ($errors->has('address'))
                <label class="error">{{ $errors->first('address') }}</label>
            @endif
        </div>
        <div class="col-100 text-center">
            <button class="creeate-account">Creează cont</button>
        </div>
    </form>
</div>
@endsection

@section('javascripts')

{{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0&libraries=places') }}
{{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}

<script>

    /*var geocoder, infoWindow, map, pos;
    function initMap() {
        map = new google.maps.Map(document.getElementById('gmap'), {
            center: {lat: 44.4268, lng: 26.1025},
            zoom: 14,
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
        });

        var geocoder = new google.maps.Geocoder;
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
                                icon: 'frontend/assets/images/pin.png',
                                map: map
                            });
                            $('#geolocation-address').val(results[1].formatted_address);
                            $.get( "https://maps.googleapis.com/maps/api/geocode/json?address="+results[1].formatted_address+"&key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0", function( data ) {
                                $('.latidude').val(data.results[0].geometry.location.lat);
                                $('.longitude').val(data.results[0].geometry.location.lng);
                                //map.panTo(new google.maps.LatLng(data.results[0].geometry.location.lat, data.results[0].geometry.location.lng));
                            });
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
    }*/

    function initialize() {

        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(44.4268, 26.1025),
            styles:[{"featureType":"all","stylers":[{"saturation":0},{"hue":"#e7ecf0"}]},{"featureType":"road","stylers":[{"saturation":-70}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"visibility":"simplified"},{"saturation":-60}]}]
        };
        var map = new google.maps.Map(document.getElementById('gmap'), mapOptions);

        google.maps.event.addListener(map, 'dragend', function() {

            var pos = {
                lat: map.getCenter().lat(),
                lng: map.getCenter().lng()
            };
            var geocoder = new google.maps.Geocoder;

            geocoder.geocode({'location': pos}, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        $('#geolocation-address-input').val(results[0].formatted_address);
                        $('.latitude').val(pos.lat);
                        $('.longitude').val(pos.lng);
                    } else {
                        console.log('No results found');
                    }
                } else {
                    console.log('Geocoder failed due to: ' + status);
                }
            });
        });

        $('<div/>').addClass('centerMarker').appendTo(map.getDiv())

        /** autocomplete **/
        var autocomplete;

        var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(44.3342445, 25.9637001),
                new google.maps.LatLng(44.5414070, 26.2255750)
        );

        autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('geolocation-address-input')),
                { bounds: bounds, types: ['address'], language: 'ro-RO', strictBounds: true }
        );

        /** restrict autocomplete to specific country **/
        autocomplete.setComponentRestrictions({'country': ['ro']});

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            $('input[name="latitude"]').val(place.geometry.location.lat());
            $('input[name="longitude"]').val(place.geometry.location.lng());

            map.panTo({
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            })

            if (!place.geometry) {
                console.log("No details available for input: '" + place.name + "'");
                return;
            }
        });

    }





    google.maps.event.addDomListener(window, 'load', initialize);


    $(document).ready(function() {

        jQuery.validator.addMethod(
                "validateUserEmail",
                function(value, element) {
                    var result = false;
                    $.ajax({
                        type: "POST",
                        url: "{{ route('check.email') }}",
                        dataType: "json",
                        data: { 'email': value, '_token': $('meta[name="csrf-token"]').attr('content') },
                        async: false,
                        success: function(data)
                        {
                            if (data.success == false)
                            {
                                result = false;
                            }
                            else
                            {
                                result = true;
                            }
                        }
                    });
                    console.log(result);
                    return result;
                },
                "Andresa de email este deja inregistrata."
        );


        $('.register-form').validate({
            onkeyup: false,
            ignore: "",
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
                },
                password : {
                    required: true,
                    minlength: 6
                },
                password_confirmation : {
                    equalTo: '[name="password"]'
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

        $('input[name="email"]').rules("add", { "validateUserEmail" : true} );
    });
</script>
@endsection
