@extends('layouts.default')

@section('css')
{{ HTML::style('frontend/assets/components/jquery-ui-1.12.1/jquery-ui.min.css') }}
{{ HTML::style('frontend/assets/components/jquery.timepicker/jquery.timepicker.css') }}
{{ HTML::style('frontend/assets/css/calendar.css') }}
@endsection

@section('content')

    <div class="container mt210">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                <h3 class="title-section">Calendar</h3>
                <div class="separator-line-div"></div>
                <ul class="breadcrumbs">
                    <li><a href="/contul-meu" title="Contul tau">Contul tau</a></li>
                    <li><span>|</span></li>
                    <li>Calendar</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mtb100">
                <div class="calendar-cell">
                {!! $calendar->show($jobs) !!}
                </div>
                {{--<div class="address-div">

                </div>--}}
            </div>
        </div>
    </div>

    <div class="content-overlay not-fixed" style="display:@if(session('modal') && session('modal') == true) block @else none @endif">
        <div class="popup-content popup-ask-offer" style="display:@if(session('modal') && session('modal') == true) block @else none @endif">
            <h3>Cere pret</h3>
            <div class="separator-line-div-small"></div>
            <p class="text-center info-text">Programati data si ora serviciilor</p>
            <form action="" method="post" class="form-popup">
                <h4>1. Data și ora</h4>
                <div class="div-padded">
                    <div class="row">
                        <div class="col-50 paddr10">
                            <input type="text" placeholder="ZZ/LL/AAAA" id="ll-skin-melon" class="input-calendar" readonly="readonly" name="date">
                        </div>
                        <div class="col-50 paddl10">
                            <div class="box-timepicker">
                                <input type="text" placeholder="18:00" class="input-timepicker"  name="time">
                            </div>
                            {{--<select name="time">
                                <option value="default">Alege ora</option>
                                @foreach($hours as $k => $hour)
                                    <option @if(in_array($hour, $unavailableHours)) disabled @endif value="{{ $k }}">{{ $hour }}</option>
                                @endforeach
                            </select>--}}
                        </div>
                    </div>
                </div>
                <h4>2. Suprafața de lucru</h4>
                <div class="div-padded">
                    <input type="text" placeholder="450 (metrii patrati)" name="area">
                </div>
                <div class="div-padded">

                </div>
                <h4>3. Ce servicii doriți?</h4>
                <div class="div-padded">
                    <ul class="chk-list">
                        @foreach($services as $k => $service)
                        <li><label class="checkbox-custom">{{ Form::checkbox('services[]', $service->id, (in_array($service->id, (!empty(Input::get('services'))?Input::get('services'):[])))? $service->id:false) }}<span></span>{{ $service->title }}</label></li>
                        @endforeach
                    </ul>
                </div>
                <hr class="line2px">
                <div class="text-center">
                    <label class="checkbox-custom wauto agree-input"><input type="checkbox" name="agree"><span></span>Sunt de acord cu <a href="">termenii si conditiile</a></label>
                </div>
                {{ Form::hidden('address', Input::get('address')) }}
                {{ Form::hidden('unique_id', ($user != null)? $user->unique_id : Input::get('unique_id')) }}
                {{ csrf_field() }}
                <button class="green-button submit-form">Cere pret</button>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>

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
{{ HTML::script('frontend/assets/components/jquery-ui-1.12.1/jquery-ui.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}
{{ HTML::script('frontend/assets/components/jquery.timepicker/jquery.timepicker.min.js') }}

<script type="text/javascript">

    $(document).ready(function () {

        /** popup **/

        $('body').on('click', '.close-popup', function (e) {
            e.preventDefault();
            $('label.error').remove();
            $(this).parent().parent().hide();
            $(this).parent().hide();
        });

        $('body').on('click', '.show-popup', function (e) {
            e.preventDefault();
            $('.content-overlay').css({'height':$(document).height()+'px'});
            var data = $(this).data('popup');

            $('.content-overlay').show();
            $('.popup-' + data).show();

        });

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

        var unavailableDates = [];

        $.ajax
        ({
            type: "POST",
            url: "{{ route('get.dates') }}",
            data: {'_token':$('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            async: false,
            success: function(results)
            {
                unavailableDates = results.unavailableDates;
            }
        });

        var dateToday = new Date();
        $('.input-calendar').datepicker({
            'dateFormat':'dd-mm-yy',
            minDate: dateToday,
            beforeShowDay: function(dt)
            {
                console.log(unavailableDates);
                $('#ui-datepicker-div').addClass(this.id);
                $('#ui-datepicker-div').addClass('no-transition');
                var string = jQuery.datepicker.formatDate('dd-mm-yy', dt);
                /*return [dt.getDay() != 0 && dt.getDay() != 6 && unavailableDates.indexOf(string) == -1];*/
                console.log(string);
                return [ unavailableDates.indexOf(string) == -1 ]
            },
            onSelect: function(date, instance) {

                $.ajax
                ({
                    type: "POST",
                    url: "{{ route('get.hours') }}",
                    data: {'date':date, '_token':$('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    success: function(results)
                    {
                        //destroy timepicker
                        $('.input-timepicker').timepicker('remove');

                        //init timepicker
                        $('.input-timepicker').timepicker({
                            minTime: '08:00',
                            maxTime: '21:00',
                            timeFormat: 'H:i',
                            appendTo: '.box-timepicker',
                            disableTimeRanges: results.unavailableHours
                        });
                        console.log(results);
                    }
                });
            }
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        //create new task / update existing task
        //$('body').on('click', '.submit-form', function (e) {


        //});

        $(window).on('load resize', function ()
        {
            $('.content-overlay').css({'height':$(document).height()+'px'});
        });

        jQuery.validator.addMethod(
            "valueNotEquals",
            function(value, element, arg){
                return arg != value;
            },
            "Selectati ora inceperii lucrarii."
        );

        //time: { valueNotEquals: "default" },

        $('.form-popup').submit(function(e) {
            e.preventDefault();
        }).validate({
            ignore: "input[type='text']:hidden",
            rules: {
                date: 'required',
                time: 'required',
                area: 'required',
                agree: 'required'
            },
            messages: {
                phone: {
                    number: "Introduceti un numar de telefon valid."
                },
                time: {
                    required: "Alegeti ora pentru inceperea lucrarilor."
                },
                date: {
                    required: "Alegeti data lucrarilor."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "agree" )
                {
                    error.insertAfter(".agree-input");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler : function(form)
            {
                $.ajax({

                    type: 'POST',
                    url: '{{ route('save.offer') }}',
                    data: $('.form-popup').serializeObject(),
                    dataType: 'json',
                    success: function (data) {
                        $('.content-overlay').hide();
                        $('.popup-ask-offer').hide();
                        //$('html, body').animate({ scrollTop: 0 }, "fast");
                        window.location.href = '/calendar';
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

                return false;
            }
        });

        $.ajax({

            type: 'GET',
            url: '{{ route('get.jobs') }}',
            data: {},
            dataType: 'json',
            success: function (result)
            {

                $("ul.dates li").each(function( index ) {
                    var element = $(this);
                    $.each(result.jobs, function( key, value ) {
                        if('li-'+value.date == element.attr('id'))
                        {
                            element.addClass('reserved');
                            element.append('<div class="cell-appointment"><strong>'+value.time.substring(0, value.time.length - 3)+'</strong><div class="small-cell">'+value.team.leader.firstname+' '+value.team.leader.lastname+'<br><small>'+value.team.leader.phone+'</small></div></div>')
                        }
                    });
                });
            }
        });


        $('body').on('click', 'ul.dates li', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if($(this).hasClass('noAddress'))
            {

                var LAT_VALUE = '{{ Auth::user()->latitude }}';
                var LONG_VALUE = '{{ Auth::user()->longitude }}';

                $('.content-overlay').css({'height':$(document).height()+'px'});
                $('.content-overlay').show();
                $('.popup-address').show();

                $('html, body').animate({ scrollTop: 0 }, 'slow');

                var autocomplete, map, geocoder;

                function initDefault() {

                    var center = (LAT_VALUE != '' && LONG_VALUE != '')? {lat:parseFloat(LAT_VALUE), lng:parseFloat(LONG_VALUE)}:{lat: 44.4268, lng: 26.1025};

                    map = new google.maps.Map(document.getElementById('maps-info'), {
                        zoom: 15,
                        center: center,
                        styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":20}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                    });
                    map.setOptions({streetViewControl: false, mapTypeControl: false});

                    geocoder = new google.maps.Geocoder;

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


                    var geocodeAddress = function(geocoder, resultsMap) {
                        $('label.error').remove();
                        var address = $('form.form-address input[name="address"]').val();
                        if(address != '') {

                            geocoder.geocode({'address': address}, function (results, status) {

                                console.log(status)
                                console.log(status)

                                if (status === 'OK') {
                                    resultsMap.setCenter(results[0].geometry.location);
                                    $('input[name="latitude"]').val(results[0].geometry.location.lat());
                                    $('input[name="longitude"]').val(results[0].geometry.location.lng());
                                } else {
                                    $('<label class="error">Adresa este invalida.</label>').insertAfter('#autocomplete');
                                }
                            });
                        } else {
                            $('<label class="error">Adresa este invalida.</label>').insertAfter('#autocomplete');
                        }
                    }

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

            } else {
                $('.mini-popup').remove();
                var _this = $(this);
                if (!_this.is('.reserved, .pastDate')) {
                    var unformatedDate = _this.attr('id').replace('li-', '');
                    var content = $('<div class="mini-popup" data-date="' + unformatedDate + '" style="display: none; left: ' + parseFloat(_this.width() + 1) + 'px"><h3>Fa o rezervare</h3><div class="separator-line-popup"></div><p>Se pot face rezervări înaceastă zi</p><a href="javascript:void(0);">Cheamă echipa</a><span class="arrow-left"></span></div>');
                    _this.append(content);
                    $('.mini-popup').show();
                }
            }
        });

        $("body").click(function(){
            $('.mini-popup').remove();
        });

        $("body").on('click', '.mini-popup > a', function(e){
            e.preventDefault();
            $('.mini-popup').remove();

            $('label.error').remove();

            var date = $(this).parent().data('date').split('-');
            var generalDate = date[2]+'-'+date[1]+'-'+date[0];


            $('.input-calendar').datepicker("setDate", generalDate);

            $.ajax
            ({
                type: "POST",
                url: "{{ route('get.hours') }}",
                data: {'date':generalDate, '_token':$('meta[name="csrf-token"]').attr('content')},
                dataType: 'json',
                success: function(results)
                {
                    //destroy timepicker
                    $('.input-timepicker').val('');
                    $('.input-timepicker').timepicker('remove');

                    //init timepicker
                    $('.input-timepicker').timepicker({
                        minTime: '08:00',
                        maxTime: '21:00',
                        timeFormat: 'H:i',
                        appendTo: '.box-timepicker',
                        disableTimeRanges: results.unavailableHours
                    });

                    $('.content-overlay').show();
                    $('.popup-ask-offer').show();
                }
            });
        });

        $('body').on('click', '.reserved', function(e){
            e.preventDefault();

            var _this = $(this);

            return;
        });


    });
</script>

@endsection