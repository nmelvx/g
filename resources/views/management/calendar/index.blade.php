@extends('layouts.default')

@section('css')
{{ HTML::style('frontend/assets/components/jquery-ui-1.12.1/jquery-ui.min.css') }}

{{ HTML::style('frontend/assets/css/calendar.css') }}
@endsection

@section('content')
    <div class="container mt210">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                <h3 class="title-section">Calendar</h3>
                <div class="separator-line-div"></div>
                <ul class="breadcrumbs">
                    <li><a href="" title="Contul tau">Contul tau</a></li>
                    <li><span>|</span></li>
                    <li>Calendar</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mtb100">
                <div class="calendar-cell">
                {!! $calendar->show() !!}
                </div>
                <div class="address-div">

                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay not-fixed" style="display:@if(isset($_POST) && !empty($_POST)) block @else none @endif">
        <div class="popup-content popup-ask-offer" style="display: block;">
            <h3>Cere pret</h3>
            <div class="separator-line-div-small"></div>
            <p class="text-center info-text">Mulțumim că ai ales serviciile noastre.</p>
            <form action="" method="post" class="form-popup">
                <h4>1. Data și ora</h4>
                <div class="div-padded">
                    <div class="row">
                        <div class="col-50 paddr10">
                            <input type="text" placeholder="ZZ/LL/AAAA" id="ll-skin-melon" class="input-calendar" name="date">
                        </div>
                        <div class="col-50 paddl10">
                            <select name="time">
                                <option value="default">Alege ora</option>
                                @foreach($hours as $k => $hour)
                                    <option value="{{ $k }}">{{ $hour }}</option>
                                @endforeach
                            </select>
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
                    <label class="checkbox-custom wauto"><input type="checkbox" name="agree"><span></span>Sunt de acord cu <a href="">termenii si conditiile</a></label>
                </div>
                {{ Form::hidden('address', Input::get('address')) }}
                {{ csrf_field() }}
                <button class="green-button submit-form">Cere pret</button>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>
    </div>

@endsection

@section('javascripts')

{{ HTML::script('frontend/assets/components/jquery-ui-1.12.1/jquery-ui.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}

<script type="text/javascript">

    $(document).ready(function () {

        /** popup **/

        $('body').on('click', '.close-popup', function (e) {
            e.preventDefault();
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

        var unavailableDates = ["15/06/2017", "16/06/2017"];


        $('.input-calendar').datepicker({
            'dateFormat':'dd/mm/yy',
            beforeShowDay: function(dt)
            {
                $('#ui-datepicker-div').addClass(this.id);
                $('#ui-datepicker-div').addClass('no-transition');
                var string = jQuery.datepicker.formatDate('dd/mm/yy', dt);
                return [dt.getDay() != 0 && dt.getDay() != 6 && unavailableDates.indexOf(string) == -1];
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

        $('.form-popup').submit(function(e) {
            e.preventDefault();
        }).validate({
            rules: {
                date: 'required',
                time: { valueNotEquals: "default" },
                area: 'required',
                agree: 'required'
            },
            messages: {
                phone: {
                    number: "Introduceti un numar de telefon valid."
                }
            },
            submitHandler : function(form)
            {

                var formData = $('.form-popup').serializeObject();

                var type = "POST";
                var my_url = '{{ route('save.offer') }}';

                $.ajax({

                    type: type,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        alert('Oferta salvata!');
                        $('.content-overlay').hide();
                        $('.popup-ask-offer').hide();
                        $('html, body').animate({ scrollTop: 0 }, "fast");
                    },
                    error: function (data) {
                        if(data.responseJSON.success == false){
                            alert('Toate campurile sunt obligatorii!');
                        }
                    }
                });

                return false;
            }
        });

    });
</script>

@endsection