@extends('layouts.site')

@section('css')
    {{ HTML::style('frontend/assets/components/jquery.fullpage/css/jquery.fullPage') }}
@endsection

@section('content')
    <div id="fullpage">
        <div class="section" id="section0">
            <div class="header-background text-center">
                <img src="frontend/assets/images/gardinero.png" alt="Gardinero" class="gardinero-sign">
                <h3>Servicii de incredere pentru curtea ta.</h3>
                <img src="frontend/assets/images/separator.png" alt="" class="separator-line">
                <p>Ai grija de gazonul tau folosind sistemul nostru de rezervari online</p>
                <div class="container-form">
                    <form action="{{ route('offer.steps') }}" method="POST" class="form-offer">
                        <h4>Afla imediat cat costa:</h4>
                        <div class="input-with-text text-left">
                            <span>Zi-ne pe ce strada stai</span>
                            <input type="text" id="autocomplete" placeholder="Ex: Padurenri nr. 10" value="{{ ($user != null)? $user->address:'' }}" name="address" class="form-input">
                        </div>
                        <div class="block-inputs" style="display: none;">
                            <div class="input-with-text w50 pull-left text-left">
                                <span>Numele tau</span>
                                <input type="text" placeholder="Ex: Mihailescu Dan" value="{{ ($user != null)? $user->firstname.' '.$user->lastname:'' }}" name="fullname" class="form-input">
                            </div>
                            <div class="input-with-text w50 pull-right text-left">
                                <span>Numarul de telefon</span>
                                <input type="text" placeholder="Ex: 0745123456" value="{{ ($user != null)? $user->phone:'' }}" name="phone" class="form-input">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        {{ Form::hidden('step1', true) }}
                        {{ Form::hidden('latitude', ($user != null)? $user->latitude:'') }}
                        {{ Form::hidden('longitude', ($user != null)? $user->longitude:'') }}
                        {{ Form::hidden('unique_id', ($user != null)? $user->unique_id:md5(uniqid(rand(), true))) }}
                        <button class="submit-btn">Vezi pretul</button>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <div class="section" id="section1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-40 col-xs-100">
                        <img src="frontend/assets/images/poza0.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="col-lg-60 col-xs-100">
                        <h4 class="section-title">Cum<br>Functioneaza?</h4>
                        <p class="section-text">Vezi care e pretul.<br>Programeaza-te.<br>Bucura-te de un gazon frumos.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="bordered-box">
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 steps">
                            <span>1</span>
                            <p class="step1 box-text">
                                Introdu adresa pentru a afla<br>
                                pretul tau personalizat pentru
                                tuns gazonul și altele
                            </p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 steps">
                            <span>2</span>
                            <p class="step2 box-text">
                                Confirma data, frecventa si<br>
                                detaliile de plata, totul online.
                            </p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 steps">
                            <span>3</span>
                            <p class="step3 box-text">
                                O echipa de profesioniști va
                                ajunge la locatie și va finaliza
                                treaba. Serviciul standard include
                                tunsul gazonului și aranjarea
                                marginilor de gazon.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section moveDown" id="section2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-60 col-xs-100 center-section">
                        <h4 class="section-title">Relaxeaza-te<br>si da-ne un<br>review</h4>
                        <p class="section-text">Pentru noi calitatea este<br>foarte importanta!</p>
                        <div class="ratings" style="margin-left: 130px;">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" checked /><label class="full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        </div>
                    </div>
                    <div class="col-lg-40 col-xs-100 center-section">
                        <img src="frontend/assets/images/poza1.jpg" class="img-responsive" alt="">
                        <p class="review-text">Remember, a Jedi can feel the Force flowing through him. Don't act so surprised, Your Highness. You weren't on any mercy mission this time. </p>
                        <p class="review-name">Luke Skywalker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section moveDown" id="section3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-40 col-xs-100 center-section">
                        <img src="frontend/assets/images/poza2.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="col-lg-60 col-xs-100 center-section">
                        <h4 class="section-title">Urmarește progresul de pe mobil</h4>
                        <p class="section-text">
                            Fii la curent cu progresul echipei oricând!
                            <br>
                            Nu va fi nevoie niciodata sa
                            platești cash, vei avea propriul
                            cont in aplicatie.
                        </p>
                        <a href="" class="left-margin download-buttons"><img src="{{asset('frontend/assets/images/download-appstore.png')}}"></a>
                        <a href="" class="download-buttons"><img src="{{asset('frontend/assets/images/download-googleplay.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section moveDown" id="section4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-60 col-xs-100 center-section">
                        <h4 class="section-title">Cine sunt profesionistii nostri?</h4>
                        <p class="section-text">Toti profesionistii Gardinero au o vasta experienta in domeniu si suntverificati cu atentie pentru a ne asigura ca vei primi cel mai de calitate serviciu.</p>

                        <div class="box-guaranty">
                            <h4 class="small-section-title">Cine sunt profesionistii nostri?</h4>
                            <p class="section-text reseted">Profesioniști cu experiență<br>
                            Muncitori verificați<br>
                            A tremor in the Force<br>
                            I find your lack of faith disturbing<br>
                            I call it luck.</p>
                            <a href="javascript:void(0);" class="green-button show-popup enter-team" data-popup="team">Intră în echipa Gardinero</a>
                        </div>
                    </div>
                    <div class="col-lg-40 col-xs-100 center-section">
                        <img src="frontend/assets/images/poza3.jpg" class="img-responsive" alt="">
                        <ul class="testimonial-slider">
                            <li>
                                <p class="slide-name">Doru Ionescu</p>
                                <p class="slide-text">Expert in amenajari exterioare cu gradini premiate la Paris ofera consilierea initiala in ceea ce privește gradina ta!</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="content-overlay absolute" style="display: none;">
        <div class="popup-content popup-team" style="display: none;">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
                    <h3>Întră în echipa<br>Gardinero</h3>
                    <img src="frontend/assets/images/separator2px.png" alt="">
                    <h4>Fa parte din echipa noastra de profesionisti.</h4>
                    <p>Vrei sa intri in echipa Gardinero? Tinem foarte mult la serviciile de calitate, de aceea, pentru a deveni membru al echipei nostre va trebui sa participi la un interviu cu expertii Gardinero.<br><br>Lasa-ne datele tale mai jos si vei fi contactat in cel mai scurt timp.</p>
                </div>
            </div>
            <form action="" method="post" class="form-popup">
                <div class="input-with-text text-left">
                    <span>Numele tau</span>
                    <input type="text" placeholder="Ex: Vasile Ion" name="fullname" class="form-input">
                </div>
                <div class="input-with-text text-left">
                    <span>Telefon</span>
                    <input type="text" placeholder="Ex: 0744 555 666" name="phone" class="form-input">
                </div>
                <div class="input-with-text text-left">
                    <span>Email</span>
                    <input type="text" placeholder="Ex: nume@nume.ro" name="email" class="form-input">
                </div>
                <div class="input-with-text text-left">
                    <span>Experiența ta în domeniu</span>
                    <textarea type="password" name="password" placeholder="Ex: Am tuns gazonul vecinilor"></textarea>
                </div>

                <a href="javascript:void(0);" data-url="{{ route('member.store') }}" class="green-button submit-form">Continua</a>
            </form>
            <a href="javascript:void(0);" class="close-popup"></a>
        </div>
        @include('includes.popup-login')
    </div>

@endsection


@section('javascripts')

    {{ HTML::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAL2UR6-n8zAxAAJ66a-YfZUvixbIxo2j0&libraries=places') }}
    {{ HTML::script('frontend/assets/components/jquery.fullpage/scrolloverflow.min.js') }}
    {{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
    {{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            /*$(window).on('load resize', function ()*/
            $(window).on('load', function ()
            {
                var section = $('.section').offset().top + $('.section').outerHeight(true);
                var bottom = $('.container-form').offset().top + $('.container-form').outerHeight(true);
                /*var position = $('.container-form').height()/2;*/

                if(bottom > section){
                    //$('.container-form').css({'bottom':'40px', 'position': 'absolute'});
                }

            });

            /*$(window).trigger('resize');*/

/*            $('#fullpage').fullpage({
                scrollingSpeed: 1000,
                verticalCentered: false,
                css3: true,
                sectionsColor: ['#ffffff', '#ffffff', '#ffffff', '#ffffff'],
                navigation: true,
                navigationPosition: 'right',
                responsiveWidth: 992
            });*/


            jQuery.validator.addMethod(
                    "withTwoStrings",
                    function(value, element) {
                        howManyWords = value.trim();
                        howManyWords = howManyWords.replace(/\s{2,}/g, ' '); //remove extra spaces
                        howManyWords = howManyWords.split(' ');

                        if(howManyWords.length == 2){
                            return true;
                        }
                        else{
                            return false;
                        }
                    },
                    "Introduceti numele si prenumele."
            );

            $('.form-offer').validate({
                rules: {
                    address: "required",
                    fullname: {
                        withTwoStrings: true
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

            var isValid = false;

            $('body').on('click', '.submit-btn', function(e){
                e.preventDefault();

                if($('.form-offer').valid() && isValid == false){
                    $('.block-inputs').show();
                    isValid = true;
                    return false;
                }

                if($('.block-inputs').is(':visible')){

                    if($('.form-offer').valid()){

                        $('.form-offer').submit();
                    }
                }

            });

            var autocomplete;

            function initialize() {


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
                    if (!place.geometry) {
                        console.log("No details available for input: '" + place.name + "'");
                        return;
                    }
                });
            }
            initialize();


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

                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });

            $(window).on('load resize', function ()
            {
                $('.content-overlay').css({'height':$(document).height()+'px'});
            });

        });


    </script>

@endsection