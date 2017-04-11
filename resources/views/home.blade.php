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
                            <input type="text" id="autocomplete" placeholder="Padurenri nr. 10" name="address" class="form-input">
                        </div>
                        <div class="block-inputs" style="display: none;">
                            <div class="input-with-text w50 pull-left text-left">
                                <span>Numele tau</span>
                                <input type="text" placeholder="Neacsu Marius" name="fullname" class="form-input">
                            </div>
                            <div class="input-with-text w50 pull-right text-left">
                                <span>Numarul de telefon</span>
                                <input type="text" placeholder="0722 000 123" name="phone" class="form-input">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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


            $('.form-offer').validate({
                rules: {
                    address: "required",
                    fullname: "required",
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
                }
            });

            $('body').on('click', '.submit-btn', function(e){
                e.preventDefault();

                if($('.form-offer').valid()){
                    $('.block-inputs').show();
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
                    if (!place.geometry) {
                        console.log("No details available for input: '" + place.name + "'");
                        return;
                    }
                });
            }
            initialize();

        });


    </script>

@endsection