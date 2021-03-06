@extends('layouts.default')

@section('content')

    <div class="container mt250">
        <div class="row display-table">
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 table-cell">
                <div class="boxed my-calendar">
                    <h3 class="box-title">Calendar<br>Gazon</h3>
                    {!! Helper::getDateAppointment($job) !!}
                    <a href="{{ route('calendar.offers') }}" class="button-custom see-prog-details">Vezi detalii</a>
                    <p>Acceseaza calendarul și cheamă o echipă</p>
                    <a href="{{ route('calendar.offers') }}" title="Intră în calendar" class="button-custom check-calendar">Intră în calendar</a>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 table-cell">
                <div class="boxed my-account">
                    <h3 class="box-title">Datele<br>tale</h3>
                    {!! Form::open(array('route' => ['contul-meu.update', Auth::user()->id ], 'method' => 'PUT', 'class' => 'edit-form')) !!}
                        <div class="form-input-box">
                            <label>Prenume</label>
                            <input type="text" name="firstname" value="{{ Auth::user()->firstname }}" placeholder="Marius" class="input-custom">
                        </div>
                        @if ($errors->has('firstname'))
                            <span class="help-block-error">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Nume</label>
                            <input type="text" name="lastname" value="{{ Auth::user()->lastname }}" placeholder="Neacsu" class="input-custom">
                        </div>
                        @if ($errors->has('lastname'))
                            <span class="help-block-error">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Telefon</label>
                            <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="0722000123" class="input-custom">
                        </div>
                        @if ($errors->has('phone'))
                            <span class="help-block-error">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" placeholder="myemail@email.com" class="input-custom">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block-error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Parola</label>
                            <input type="password" name="password" autocomplete="off" placeholder="Parola" class="input-custom">
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block-error">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="form-input-box">
                            <label>Confirma parola</label>
                            <input type="password" name="password_confirmation" autocomplete="off" placeholder="Confirma parola" class="input-custom">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block-error">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                        <button class="button-custom yellow">Actualizeaza cont</button>
                        @if (Session::has('success'))
                            <label class="success-msg">{{ Session::get('success') }}</label>
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 table-cell">
                <div class="boxed my-address">
                    <h3 class="box-title">Adresa<br>ta</h3>
                    <p>{{ Auth::user()->address }}</p>
                    <div class="google-map-address">
                        <div class="gmap no-transition" id="gmap"></div>
                        <button class="button-custom green show-popup" data-popup="address">Schimba adresa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row display-table">
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 table-cell">
                <div class="boxed my-financial">
                    <h3 class="box-title">Datele tale<br>financiare</h3>
                    {{--
                    @if(!$cards->isEmpty())
                    <form action="" method="post" id="paymentsForm">
                        @foreach($cards as $card)
                        <div class="form-input-box" id="box{{ $card->id }}">
                            <label class="no-bold w100">
                                {{ Form::radio('paymentMethodToken', $card->token, ($card->defaultPaymentMethod == 1)? 1:0, ['class' => 'pull-left', 'style' => 'margin-top: 23px;', 'data-pid' => $card->id]) }}
                                <div class="padded-payment">
                                    <span class="hosted-fields--label" for="card-number">{{ $card->cardType }}</span>
                                    <div class="payment-method-card">{{ chunk_split($card->maskedNumber, 4, ' ') }}</div>
                                    <div class="payment-method-date">{{ $card->expirationMonth }}/{{ $card->expirationYear }}</div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                        {{ Form::hidden('paymentId', ($card->defaultPaymentMethod == 1)? $card->id:'') }}
                        <button type="submit" class="button-custom purple" id="deleteCard">Sterge card</button>
                    </form>
                    @else
                    <form action="" method="post" id="cardForm">

                        <div class="form-input-box-card">
                            <label class="hosted-fields--label" for="card-number">Numar card</label>
                            <div id="card-number" class="hosted-field"></div>
                        </div>
                        <div class="form-input-box-card">
                            <label class="hosted-fields--label" for="expiration-date">Data expirare</label>
                            <div id="expiration-date" class="hosted-field"></div>
                        </div>
                        <div class="form-input-box-card">
                            <label class="hosted-fields--label" for="cvv">CVC</label>
                            <div id="cvv" class="hosted-field"></div>
                        </div>
                        <button type="submit" class="button-custom purple" id="saveCard" style="display: none;">Salveaza</button>
                    </form>
                    @endif
                    --}}
                </div>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 table-cell">
                <div class="boxed my-win">
                    <h3 class="box-title">Câștigă<br>100 lei</h3>
                    <p>Trimite linkul tau la 2 prieteni si castiga servicii in valoare de 100 de lei</p>
                    <a href="" class="post-link post-fb">Posteaza pe Facebook</a>
                    <a href="" class="post-link post-tw">Posteaza pe Twitter</a>
                    <a href="" class="post-link post-gp">Posteaza pe Google+</a>
                    <p>Prieteni înscriși: 1/2</p>
                </div>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 table-cell">
                <div class="boxed my-oppinion">
                    <h3 class="box-title">Părerea ta<br>contează</h3>
                    <p>Zi-ne cum ti se par serviciile noastre si ce putem imbunatati:</p>
                    {!! Form::open(array('route' => 'send.opinion', 'method' => 'POST')) !!}
                        <textarea rows="5" cols="20" name="opinion" class="textarea-custom"></textarea>
                        <button class="button-custom orange">Trimite</button>
                        @if (Session::has('success-opinion'))
                        <label class="success-msg">{{ Session::get('success-opinion') }}</label>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content-overlay absolute" style="display: none;">
        <div class="popup-content popup-address" style="display: none;">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                    <h3>Adresa ta</h3>
                    <p>Introduceti adresa corecta pentru a primi oferta cat mai clara</p>
                </div>
            </div>
            <form method="post" class="form-popup form-address">
                <div id="maps-info" class="no-transition"></div>
                <div class="input-with-text relative text-left">
                    <span>Adresa ta</span>
                    <div class="clearfix"></div>
                    <input type="text" id="autocomplete" placeholder="Padureni nr 10" name="address" value="{{ Auth::user()->address }}" class="form-input">
                    <button class="get-address"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                {{ Form::hidden('latitude', Auth::user()->latitude) }}
                {{ Form::hidden('longitude', Auth::user()->longitude) }}
                {{ csrf_field() }}

                <button class="green-button submit-form">Salveaza modificarile</button>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>
    </div>

@endsection

@section('javascripts')

    {{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0&libraries=places') }}
    {{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
    {{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}
    {{ HTML::script('https://js.braintreegateway.com/web/3.19.0/js/client.js') }}
    {{ HTML::script('https://js.braintreegateway.com/web/3.19.0/js/hosted-fields.js') }}

    <script type="text/javascript">

        {{--
        var form = document.querySelector('#cardForm');
        var submit = document.querySelector('#saveCard');
        var deletePayment = document.querySelector('#paymentsForm');

        jQuery.fn.exists = function(){ return this.length > 0; }

        if($('#saveCard').exists())
        {
            braintree.client.create({
                //authorization: 'production_gx8vk64v_jm6y5bfbcmjp4dhm'
                authorization: '{{ $clientToken }}'
            }, function (err, clientInstance) {
                if (err) {
                    console.error(err);
                    return;
                }

                // Create input fields and add text styles
                braintree.hostedFields.create({
                    client: clientInstance,
                    styles: {
                        'input': {
                            'font-size': '18px',
                            'font-family': 'Fira Sans, sans-serif',
                            'font-weight': 'lighter',
                            'color': '#ffffff'
                        },
                        ':focus': {
                            'color': '#ffffff'
                        },
                        '.valid': {
                            'color': '#ffffff'
                        },
                        '.invalid': {
                            'color': '#FF4136'
                        }
                    },
                    fields: {
                        number: {
                            selector: '#card-number',
                            placeholder: '4200 0000 0000 6000'
                        },
                        cvv: {
                            selector: '#cvv',
                            placeholder: '123'
                        },
                        expirationDate: {
                            selector: '#expiration-date',
                            placeholder: 'MM/YYYY'
                        }
                    }
                }, function (err, hostedFieldsInstance) {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    hostedFieldsInstance.on('validityChange', function (event) {
                        // Check if all fields are valid, then show submit button
                        var formValid = Object.keys(event.fields).every(function (key) {
                            return event.fields[key].isValid;
                        });

                        if (formValid) {
                            $('#saveCard').addClass('show-button');
                        } else {
                            $('#saveCard').removeClass('show-button');
                        }
                    });


                    hostedFieldsInstance.on('cardTypeChange', function (event) {
                        // Change card bg depending on card type
                        if (event.cards.length === 1) {
                            $(form).removeClass().addClass(event.cards[0].type);

                            // Change the CVV length for AmericanExpress cards
                            if (event.cards[0].code.size === 4) {
                                hostedFieldsInstance.setAttribute({
                                    field: 'cvv',
                                    attribute: 'placeholder',
                                    value: '1234'
                                });
                            }
                        } else {
                            hostedFieldsInstance.setAttribute({
                                field: 'cvv',
                                attribute: 'placeholder',
                                value: '123'
                            });
                        }
                    });

                    submit.addEventListener('click', function (event) {
                        event.preventDefault();

                        hostedFieldsInstance.tokenize(function (err, payload) {
                            if (err) {
                                console.error(err);
                                return;
                            }

                            $.ajax
                            ({
                                type: "POST",
                                url: "{{ route('payment.create') }}",
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'paymentMethodNonce': payload.nonce,
                                    'createPayment': true
                                },
                                dataType: 'json',
                                success: function (result) {
                                    console.log(result)
                                    if (result.success) {
                                        window.location.href = '/contul-meu';
                                    }

                                }
                            });

                        });
                    }, false);

                });
            });
        }

        if($('#paymentsForm').exists())
        {
            $('body').on('change', 'input[name="paymentMethodToken"]', function(){
                $('input[name="paymentId"]').val($(this).data('pid'));
            });


            deletePayment.addEventListener('submit', function (event) {
                event.preventDefault();

                $.ajax
                ({
                    type: "POST",
                    url: "{{ route('payment.delete') }}",
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'paymentMethodToken': $('input[name="paymentMethodToken"]:checked').val(),
                        'paymentId': $('input[name="paymentId"]').val()
                    },
                    dataType: 'json',
                    async: false,
                    success: function (result)
                    {
                        if (result.success) {
                            $('#box'+result.extra.pid).remove();
                            $('input:radio[name="paymentMethodToken"]:first').prop('checked', true);
                            if(result.extra.form == 1){
                                window.location.reload();
                            }
                        }
                    }
                });

            }, false);
        }
        --}}

        $(document).ready(function() {

            $.fn.serializeObject = function () {
                var o = {};
                var a = this.serializeArray();
                $.each(a, function () {
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };

            var geocoder, infoWindow, gmap, pos;

            var LAT_VALUE = '{{ Auth::user()->latitude }}';
            var LONG_VALUE = '{{ Auth::user()->longitude }}';

            var currentPosition = (LAT_VALUE != '' && LONG_VALUE != '')? {lat:parseFloat(LAT_VALUE), lng:parseFloat(LONG_VALUE)}:{lat: 44.4268, lng: 26.1025};


            function initMap() {

                gmap = new google.maps.Map(document.getElementById('gmap'), {
                    center: currentPosition,
                    zoom: 15,
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                });
                gmap.setOptions({draggable: false, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true, streetViewControl: false, mapTypeControl: false});

                geocoder = new google.maps.Geocoder;
                infoWindow = new google.maps.InfoWindow;

                if(LAT_VALUE != '' && LONG_VALUE != '')
                {
                    console.log(currentPosition)
                    new google.maps.Marker({
                        position: currentPosition,
                        icon: 'frontend/assets/images/pin.png',
                        map: gmap
                    });

                    gmap.setCenter(new google.maps.LatLng({lat:parseFloat(LAT_VALUE), lng:parseFloat(LONG_VALUE)}));
                } else {

                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };

                            geocoder.geocode({'location': pos}, function (results, status) {
                                if (status === 'OK') {
                                    if (results[0]) {
                                        new google.maps.Marker({
                                            position: pos,
                                            icon: 'frontend/assets/images/pin.png',
                                            map: gmap
                                        });
                                        $('#geolocation-address').text(results[0].formatted_address);
                                    } else {
                                        console.log('No results found');
                                    }
                                } else {
                                    console.log('Geocoder failed due to: ' + status);
                                }
                            });

                            gmap.setCenter(pos);

                        }, function () {
                            handleLocationError(true, infoWindow, gmap.getCenter());
                        });
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infoWindow, gmap.getCenter());
                    }
                }
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
            }

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

                    if (inputElements[i].type.toLowerCase() == "password") {
                        inputElements[i].value = '';
                    }
                }
            }
        });

        /** popup **/

        $('body').on('click', '.close-popup', function (e) {
            e.preventDefault();
            $('label.error').remove();
            $(this).parent().parent().hide();
            $(this).parent().hide();
        });

        $(window).on('load resize', function ()
        {
            $('.content-overlay').css({'height':$(document).height()+'px'});
        });


        var geocodeAddress = function (g, resultsMap) {

            $('label.error').remove();
            var address = $('input[name="address"]').val();
            g.geocode({'address': address}, function(results, status)
            {
                if (status === 'OK')
                {
                    resultsMap.setCenter(results[0].geometry.location);
                    $('input[name="latitude"]').val(results[0].geometry.location.lat());
                    $('input[name="longitude"]').val(results[0].geometry.location.lng());
                } else {
                    $('<label class="error">Adresa este invalida.</label>').insertAfter('#autocomplete');
                }
            });
        }


        $('body').on('click', '.show-popup', function (e) {
            e.preventDefault();

            var LAT_VALUE = '{{ Auth::user()->latitude }}';
            var LONG_VALUE = '{{ Auth::user()->longitude }}';
            var map;

            $('.content-overlay').css({'height':$(document).height()+'px'});
            var data = $(this).data('popup');

            $('.content-overlay').show();
            $('.popup-' + data).show();

            $('html, body').animate({ scrollTop: 0 }, 'slow');

            var autocomplete;

            function initDefault() {

                var center = (LAT_VALUE != '' && LONG_VALUE != '')? {lat:parseFloat(LAT_VALUE), lng:parseFloat(LONG_VALUE)}:{lat: 44.4268, lng: 26.1025};

                map = new google.maps.Map(document.getElementById('maps-info'), {
                    zoom: 15,
                    center: center,
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                });
                map.setOptions({streetViewControl: false, mapTypeControl: false});
                var geocoder = new google.maps.Geocoder();

                console.log(geocoder);

                $('body').on('click', '.get-address', function (e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    geocodeAddress(geocoder, map);
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
                                $('input[name="address"]').val(results[0].formatted_address);
                                $('input[name="latitude"]').val(pos.lat);
                                $('input[name="longitude"]').val(pos.lng);
                            } else {
                                console.log('No results found');
                            }
                        } else {
                            console.log('Geocoder failed due to: ' + status);
                        }
                    });
                });

                $('<div/>').addClass('centerMarker').appendTo(map.getDiv())


                /** init autocomplete **/

                var bounds = new google.maps.LatLngBounds(
                        new google.maps.LatLng(44.3342445, 25.9637001),
                        new google.maps.LatLng(44.5414070, 26.2255750)
                );

                autocomplete = new google.maps.places.Autocomplete(
                        (document.getElementById('autocomplete')),
                        { bounds: bounds, types: ['address'], language: 'ro-RO', strictBounds: true }
                );

                /** restrict autocomplete to specific country **/
                autocomplete.setComponentRestrictions({'country': ['ro']});

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    $('input[name="latitude"]').val(place.geometry.location.lat());
                    $('input[name="longitude"]').val(place.geometry.location.lng());
                    map.panTo(new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng()));
                    if (!place.geometry) {
                        console.log("No details available for input: '" + place.name + "'");
                        return;
                    }
                });

            }

            initDefault();


            $('.form-address').submit(function(e) {
                e.preventDefault();
            }).validate({
                ignore: "",
                rules: {
                    address: 'required'
                },
                messages: {
                    address: {
                        required: "Introduceti o adresa corecta."
                    }
                },
                submitHandler : function(form)
                {
                    $.ajax({

                        type: 'POST',
                        url: '{{ route('change.address') }}',
                        data: $('.form-address').serializeObject(),
                        dataType: 'json',
                        success: function (data) {
                            //$('.content-overlay').hide();
                            //$('.popup-ask-offer').hide();

                            location.reload();
                            //google.maps.event.trigger(gmap, 'resize');
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });

                    return false;
                }
            });

        });


    </script>

@endsection