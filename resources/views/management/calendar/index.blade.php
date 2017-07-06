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

    <div class="content-overlay not-fixed" style="display:@if(session('modal') == true || ((isset($_GET['success']) && $_GET['success'] == 'true'))) block @else none @endif">

        <!-- last job id requested -->
        <input type="hidden" id="jobId" value="{{ $job->id }}">

        <div class="popup-content popup-ask-offer" style="display:@if(session('modal') && session('modal') == true) block @else none @endif">
            <h3>Cere pret</h3>
            <div class="separator-line-div-small"></div>
            <p class="text-center info-text">Programati data si ora serviciilor</p>
            <form action="" method="post" class="form-popup form-offer-calendar">
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
                        </div>
                    </div>
                </div>
                <h4>2. Suprafața de lucru</h4>
                <div class="div-padded">
                    <input type="text" placeholder="450 (metrii patrati)" name="area" class="calculate-area">
                </div>
                <h4>3. Ce servicii doriți?</h4>
                <div class="div-padded">
                    <ul class="chk-list">
                        @foreach($services as $k => $service)
                        <li><label class="checkbox-custom">{{ Form::checkbox('services[]', $service->id, (in_array($service->id, (!empty(Input::get('services'))?Input::get('services'):[])))? $service->id:false) }}<span></span>{{ $service->title }}</label></li>
                        @endforeach
                    </ul>
                </div>
                <h3 class="text-center f35">Cost serviciu: <span class="estimated-price">90</span> lei</h3>
                <span class="estimated-block error"></span>
                <div class="div-padded">
                    <div class="input-with-text text-left">
                        <span>Vrei sa ne lasi o nota?</span>
                        <textarea name="observations" placeholder="Aici poti lasa un mesaj echipei"></textarea>
                    </div>
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

        <div class="popup-content popup-service-detail-finshed" style="display:none;">
        </div>

        <div class="popup-content popup-offer-detail" style="display: none;">
            <h3>Rezervare</h3>
            <div class="separator-line-div-small"></div>
            <p class="text-center info-text date">Detalii servicii programate</p>
            <form action="" method="post" class="form-popup form-offer-calendar">
                <h4>1. Data și ora</h4>
                <div class="div-padded">
                    <div class="row">
                        <div class="col-100 paddr10">
                            <p class="list-info date"></p>
                            <p class="list-info time"></p>
                        </div>
                    </div>
                </div>
                <h4>2. Detalii echipa</h4>
                <div class="div-padded">
                    <p class="list-info team-leader"></p>
                    <p class="list-info contact-phone"></p>
                </div>
                <h4>3. Detalii serviciu</h4>
                <div class="div-padded">
                    <p class="list-info area"></p>
                    <p class="list-info duration"></p>
                </div>

                <h4>4. Ce servicii doriti?</h4>
                <div class="div-padded">
                    <ul class="chk-list list-info servicii">
                    </ul>
                </div>
                <div class="div-padded">
                    <h3 class="text-center f35" style="margin-top: 40px;">Cost serviciu: <span class="final estimated-price">0</span> lei</h3>
                </div>
            </form>

            <a href="javascript:void(0);" class="green-button submit-form" id="payOffer" style="display: none;">Plateste</a>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>

        <div class="popup-content popup-payment" style="display:none;">
            <h3>Plateste cu cardul</h3>
            <div class="separator-line-div-small"></div>
            @if(!empty($paymentMethod))
            <form action="" method="post" id="methodForm">
                <div class="input-with-text text-left">
                    <label class="no-bold w100">
                        <input type="radio" name="paymentMethodToken" checked value="{{ $paymentMethod->token }}" class="pull-left">
                        <div class="padded-payment">
                            <label class="hosted-fields--label" for="card-number">{{ $paymentMethod->cardType }}</label>
                            <div class="payment-method-card">{{ chunk_split($paymentMethod->maskedNumber, 4, ' ') }}</div>
                            <div class="payment-method-date">{{ $paymentMethod->expirationMonth }}/{{ $paymentMethod->expirationYear }}</div>
                        </div>
                    </label>
                </div>
                <button type="submit" class="green-button submit-form" id="payMethod">Plateste</button>
            </form>
            @else
            <p class="text-center info-text">Introduceti datele cardului pentru a efectua plata serviciilor.</p>
            <form action="" method="post" id="cardForm">
                <div class="input-with-text text-left">
                    <label class="hosted-fields--label" for="card-number">Numar card</label>
                    <div id="card-number" class="hosted-field"></div>
                </div>
                <div class="input-with-text text-left">
                    <label class="hosted-fields--label" for="expiration-date">Data expirare</label>
                    <div id="expiration-date" class="hosted-field"></div>
                </div>
                <div class="input-with-text text-left">
                    <label class="hosted-fields--label" for="cvv">CVC</label>
                    <div id="cvv" class="hosted-field"></div>
                </div>
                <button type="submit" class="green-button submit-form" id="payCard">Plateste</button>
            </form>
            @endif
            <a href="javascript:void(0);" class="close-popup"></a>
            <div class="loader"></div>
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

        <div class="popup-content popup-thanks" style="display: {{ (isset($_GET['success']) && $_GET['success'] == 'true')? 'block':'none' }};">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                    <h3>Multumim,</h3>
                    <div class="separator-line-popup"></div>
                    <p>Vei primi in scurt timp un email cu detailii despre comanda.</p>
                </div>
            </div>
            <button class="green-button submit-form close-popup-button">Continua</button>
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
    {{ HTML::script('frontend/assets/components/jquery.payment.min.js') }}
    {{ HTML::script('https://js.braintreegateway.com/web/3.19.0/js/client.js') }}
    {{ HTML::script('https://js.braintreegateway.com/web/3.19.0/js/hosted-fields.js') }}

<script type="text/javascript">


    /*jQuery(function($) {
        $('[data-numeric]').payment('restrictNumeric');
        $('.cc-number').payment('formatCardNumber');
        $('.cc-exp').payment('formatCardExpiry');
        $('.cc-cvc').payment('formatCardCVC');

        $.fn.toggleInputError = function(erred) {
            this.parent('.form-group').toggleClass('has-error', erred);
            return this;
        };

        $('form').submit(function(e) {
            e.preventDefault();

            var cardType = $.payment.cardType($('.cc-number').val());
            $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
            $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
            $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
            $('.cc-brand').text(cardType);

            $('.validation').removeClass('text-danger text-success');
            $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
        });

    });*/

    var form = document.querySelector('#cardForm');
    var submit = document.querySelector('#payCard');
    var submitPayment = document.querySelector('#payMethod');

    jQuery.fn.exists = function(){ return this.length > 0; }

    if($('#payMethod').exists()) {
        braintree.client.create({
            authorization: 'sandbox_xn2nh32z_rqwxyg33g8bcmvkv'
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
                        'color': '#9eb2a9'
                    },
                    ':focus': {
                        'color': '#9eb2a9'
                    },
                    '.valid': {
                        'color': '#9eb2a9'
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

                    (formValid) ? $('#payCard').addClass('show-button') : $('#payCard').removeClass('show-button');
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

                    //$('.content-overlay').hide();
                    //$('.popup-payment').hide();
                    $('.loader').show();

                    hostedFieldsInstance.tokenize(function (err, payload) {
                        if (err) {
                            console.error(err);
                            return;
                        }

                        console.log(payload)

                        if ($('#jobId').val() !== 0) {
                            $.ajax
                            ({
                                type: "POST",
                                url: "{{ route('payment.create') }}",
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'paymentMethodNonce': payload.nonce,
                                    'job_id': $('#jobId').val()
                                },
                                dataType: 'json',
                                async: false,
                                success: function (result) {
                                    console.log(result)
                                    if (result.success) {
                                        console.log(result);
                                        window.location.href = '/calendar?success=true';
                                    } else {
                                        $('<label class="error">' + result.message + '</label>').insertBefore('#payCard');
                                    }

                                }
                            });
                        }
                    });
                }, false);
            });
        });
    }

    $('body').on('click', '#payOffer', function(){
        $(this).parent().hide();
        $('.popup-payment').show();
        $('html, body').animate({ scrollTop: 0 }, "slow");
    });

    if(submitPayment != null) {
        submitPayment.addEventListener('click', function (event) {
            event.preventDefault();

            $('.loader').show();

            if ($('#jobId').val() !== 0) {
                $.ajax
                ({
                    type: "POST",
                    url: "{{ route('payment.create') }}",
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'paymentMethodNonce': null,
                        'job_id': $('#jobId').val()
                    },
                    dataType: 'json',
                    async: false,
                    success: function (result) {
                        console.log(result)
                        if (result.success) {
                            console.log(result);
                            window.location.href = '/calendar?success=true';
                        } else {
                            $('<label class="error">' + result.message + '</label>').insertBefore('#payCard');
                        }

                    }
                });
            }
        }, false);
    }

    $(document).ready(function () {


        $('.cc-number').payment('formatCardNumber');
        $('.cc-exp').payment('formatCardExpiry');
        $('.cc-cvc').payment('formatCardCVC');

        /** popup **/

        $('body').on('click', '.close-popup, .close-popup-button', function (e) {
            e.preventDefault();
            $('label.error').remove();
            $(this).parent().parent().hide();
            $(this).parent().hide();
            history.pushState("", document.title, window.location.pathname);
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

                $('#ui-datepicker-div').addClass(this.id);
                $('#ui-datepicker-div').addClass('no-transition');
                var string = jQuery.datepicker.formatDate('dd-mm-yy', dt);
                /*return [dt.getDay() != 0 && dt.getDay() != 6 && unavailableDates.indexOf(string) == -1];*/

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

        $('.form-offer-calendar').submit(function(e) {
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
                    data: $('.form-offer-calendar').serializeObject(),
                    dataType: 'json',
                    success: function (data) {

                        $('html, body').animate({ scrollTop: 0 }, "slow");
                        $('.popup-ask-offer').hide();
                        $('#jobId').val(data.job_id);
                        $('.popup-payment').show();

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
                            element.addClass((value.status == 1)?'finalized':'reserved');
                            element.append('<div class="cell-appointment" data-jobid='+value.id+'><strong>'+value.time.substring(0, value.time.length - 3)+'</strong><div class="small-cell">'+value.team.leader.firstname+' '+value.team.leader.lastname+'<br><small>'+value.team.leader.phone+'</small></div></div>')
                        }
                    });
                });

            }
        });

        var formatDate = function(date) {
            return date.getDate() + "-" + date.getMonth() + "-" + date.getFullYear();
        }
        var durationFormat = function(duration) {
            var sec_num = parseInt(duration, 10);
            var hours   = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            //if (hours   < 10) {hours   = "0"+hours;}
            //if (minutes < 10) {minutes = "0"+minutes;}
            if (seconds < 10) {seconds = "0"+seconds;}
            var stringHours = '';
            if(hours > 0){
                stringHours += ((hours > 1)? hours+' ore si ':hours+' ora si ');
            }
            return 'aproximativ '+stringHours+((minutes > 1)?  minutes+' de minute':minutes+' un minut');
        }


        $('body').on('click', '.reserved .cell-appointment', function(e){
            e.preventDefault();
            var _this = $(this);

            $('#jobId').val(_this.data('jobid'));

            $.ajax({

                type: 'GET',
                url: '{{ route('get.job') }}',
                dataType: 'json',
                data: { id:_this.data('jobid') },
                success: function (result)
                {

                    $('.list-info.date').html(formatDate(new Date(result.job.date)));
                    $('.list-info.time').html(result.job.time);
                    $('.list-info.team-leader').html('Echipa condusa de: <strong>'+result.job.team.leader.firstname+' '+result.job.team.leader.lastname+'</strong>');
                    $('.list-info.contact-phone').html('Telefon contact: <strong>'+result.job.team.leader.phone+'</strong>');
                    $('.list-info.area').html('Suprafata de lucru: <strong>' + result.job.area + ' mp</strong>');
                    $('.list-info.duration').html('Durata serviciu: <strong>' + durationFormat(result.job.total_duration)+'</strong>');
                    $('.final.estimated-price').html(result.job.sum);

                    var services = '';

                    $.each(result.job['services'], function( index, value ) {
                        services += '<li><label class="checkbox-custom"><input type="checkbox" disabled checked value="'+value.id+'" name="serivces[]"><span></span>'+value.title+'</label></li>';
                    });

                    $('.list-info.servicii').html(services);

                    if(result.job.payed == 0){
                        $('#payOffer').show();
                    }
                }
            });

            setTimeout(function () {
                $('.content-overlay').css({'height':$(document).height()+'px'});
                $('.content-overlay').show();
                $('.popup-offer-detail').show();
            }, 200)

            $('html, body').animate({ scrollTop: 0 }, 'slow');

        });


        $('body').on('click', '.finalized .cell-appointment', function(e){
            e.preventDefault();
            var _this = $(this);

            $.ajax({

                type: 'GET',
                url: '{{ route('get.job') }}',
                dataType: 'json',
                data: { id:_this.data('jobid') },
                success: function (result)
                {
                    /*
                    $('.list-info.date').html(formatDate(new Date(result.job.date)));
                    $('.list-info.time').html(result.job.time);
                    $('.list-info.area').html('Suprafata de lucru: <strong>' + result.job.area + ' mp</strong>');
                    $('.list-info.duration').html('Durata serviciu: <strong>' + durationFormat(result.job.total_duration)+'</strong>');
                    $('.final.estimated-price').html(result.job.sum);

                    var services, images = '';

                    $.each(result.job['services'], function( index, value ) {
                        services += '<li><label class="checkbox-custom"><input type="checkbox" disabled checked value="'+value.id+'" name="serivces[]"><span></span>'+value.title+'</label></li>';
                    });
                    $('.list-info.servicii').html(services);

                    $.each(result.job['images'], function( index, value ) {
                        if(index == 3){
                            images += '<div class="gallery-image"><img src="" class="img-responsive"></div>';
                        } else {
                            images += '<div class="gallery-image"><img src="" class="img-responsive"></div>';
                        }
                    });
                    $('.list-info.images').html(images);
                    */

                    $('.popup-service-detail-finshed').html(result.view);


                }
            });

            setTimeout(function () {
                $('.content-overlay').css({'height':$(document).height()+'px'});
                $('.content-overlay').show();
                $('.popup-service-detail-finshed').show();
            }, 200)

            $('html, body').animate({ scrollTop: 0 }, 'slow');

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
                if (!_this.is('.reserved, .pastDate, .finalized')) {
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
                    $('.estimated-block').text('');


                    //init timepicker
                    $('.input-timepicker').timepicker({
                        minTime: '08:00',
                        maxTime: '21:00',
                        timeFormat: 'H:i',
                        appendTo: '.box-timepicker',
                        disableTimeRanges: results.unavailableHours
                    });

                    $.ajax
                    ({
                        type: "POST",
                        url: "{{ route('get.price') }}",
                        data: $('.form-offer-calendar').serializeObject(),
                        dataType: 'json',
                        success: function(results)
                        {
                            $('.estimated-price').text(results.sum);

                            if(results.success == false){
                                $('.estimated-block').text(results.message);
                            }

                            $('html, body').animate({ scrollTop: 0 }, 'slow');

                            $('.content-overlay').show();
                            $('.popup-ask-offer').show();
                        }
                    });
                }
            });

        });

        $('body').on('click', '.form-offer-calendar > div > .chk-list > li > label', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();

            if($(this).find('input').prop('checked') == true){
                $(this).find('input').prop('checked', false);
            } else {
                $(this).find('input').prop('checked', true);
            }

            $('.estimated-block').text('');

            $.ajax
            ({
                type: "POST",
                url: "{{ route('get.price') }}",
                data: $('.form-offer-calendar').serializeObject(),
                async: false,
                dataType: 'json',
                success: function(results)
                {
                    $('.estimated-price').text(results.sum);

                    if(results.success == false){
                        $('.estimated-block').text(results.message);
                    }

                }
            });
        });

        $('body').on('keyup', '.calculate-area', function(e){

            $('.estimated-block').text('');

            $.ajax
            ({
                type: "POST",
                url: "{{ route('get.price') }}",
                data: $('.form-offer-calendar').serializeObject(),
                async: false,
                dataType: 'json',
                success: function(results)
                {
                    $('.estimated-price').text(results.sum);

                    if(results.success == false){
                        $('.estimated-block').text(results.message);
                    }

                }
            });
        });

    });
</script>

@endsection