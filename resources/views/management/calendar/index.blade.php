@extends('layouts.default')

@section('css')
    {{ HTML::style('frontend/assets/components/air-datepicker/css/datepicker.min.css') }}
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

            </div>
        </div>
    </div>

    <div class="content-overlay not-fixed" style="display: block;">
        <div class="popup-content popup-ask-offer" style="display: block;">
            <h3>Cere pret</h3>
            <div class="separator-line-div-small"></div>
            <p class="text-center info-text">Mulțumim că ai ales serviciile noastre.</p>
            <form action="" method="post" class="form-popup">
                <h4>1. Data și ora</h4>
                <div class="div-padded">
                    <div class="row">
                        <div class="col-50 paddr10">
                            <input type="text" placeholder="ZZ/LL/AAAA" class="input-calendar" name="date">
                        </div>
                        <div class="col-50 paddl10">
                            <select name="user_id" name="hour">
                                <option value="">Alege ora</option>
                                @foreach($hours as $k => $hour)
                                    <option value="{{ $k }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <h4>2. Suprafața de lucru</h4>
                <div class="div-padded">
                    <input type="text" placeholder="450 mp" name="area">
                </div>
                <div class="div-padded">

                </div>
                <h4>3. Ce servicii doriți?</h4>
                <div class="div-padded">
                    <ul class="chk-list">
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Tuns regulat al gazonului</label></li>
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Tuns gazon o singura data</label></li>
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Scarificare <em>(aerare)</em></label></li>
                        <li><label class="checkbox-custom"><input type="checkbox" name="services[]"><span></span>Toaletare copaci</label></li>
                    </ul>
                </div>
                <hr class="line2px">
                <div class="text-center">
                    <label class="checkbox-custom wauto"><input type="checkbox" name="services[]"><span></span>Sunt de acord cu <a href="">termenii si conditiile</a></label>
                </div>

                <a href="javascript:void(0);" data-url="{{ route('save.offer') }}" class="green-button submit-form">Cere pret</a>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>
    </div>

@endsection

@section('javascripts')

    {{ HTML::script('frontend/assets/components/air-datepicker/js/datepicker.min.js') }}
    {{ HTML::script('frontend/assets/components/air-datepicker/js/i18n/datepicker.ro.js') }}

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

            $('.input-calendar').datepicker({
                language: 'ro',
                minDate: new Date()
            })

            //create new task / update existing task
            $('body').on('click', '.submit-form', function (e) {

                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                });

                e.preventDefault();

                var formData = $(this).parent('form').serializeObject();

                var type = "POST"; //for creating new resource
                var my_url = $(this).data('url');

                $.ajax({

                    type: type,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        alert('Oferta salvata cu succes!');
                        $('.content-overlay').hide();
                        $('.popup-ask-offer').hide();
                        $('html, body').animate({ scrollTop: 0 }, "fast");
                    },
                    error: function (data) {
                        console.log(data.responseJSON)
                        if(data.responseJSON.success == false){
                            alert('Toate campurile sunt obligatorii!');
                        }
                    }
                });
            });

            $(window).on('load resize', function ()
            {
                $('.content-overlay').css({'height':$(document).height()+'px'});
            });


        });
    </script>

@endsection