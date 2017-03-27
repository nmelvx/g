@extends('layouts.site')

@section('css')
    {{ HTML::style('frontend/assets/components/jquery.fullpage/css/jquery.fullPage') }}
@endsection

@section('content')
    <div id="fullpage">
        <div class="section" id="section0">
            <div class="header-background text-center">
                <img src="frontend/assets/images/gardinero.png" alt="Gardinero" class="gardinero-sign">
                <h3>Servicii de încredere pentru curtea ta.</h3>
                <img src="frontend/assets/images/separator.png" alt="" class="separator-line">
                <p>Ai grijă de gazonul tău folosind sistemul nostru de rezervări online</p>
                <div class="container-form">
                    <h4>Afla imediat cat costa:</h4>
                    <div class="input-with-text text-left">
                        <span>Zi-ne pe ce stradă stai</span>
                        <input type="text" placeholder="Padurenri nr. 10" class="form-input">
                    </div>
                    <div class="block-inputs">
                        <div class="input-with-text w50 pull-left text-left">
                            <span>Numele tău</span>
                            <input type="text" placeholder="Neacsu Marius" class="form-input">
                        </div>
                        <div class="input-with-text w50 pull-right text-left">
                            <span>Numărul de telefon</span>
                            <input type="text" placeholder="0722 000 123" class="form-input">
                        </div>
                    </div>
                    <button class="submit-btn">Vezi pretul</button>
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
                    <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                </div>
            </div>
        </div>

        <div class="section moveDown" id="section2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                </div>
            </div>
        </div>
        <div class="section moveDown" id="section3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel diam arcu. Donec blandit porttitor ante, ultricies aliquet est vehicula at. Cras fringilla elit non malesuada fringilla. Aliquam erat volutpat. Suspendisse non turpis arcu. Nullam sapien ipsum, iaculis sed vehicula non, ultricies et purus. Morbi eget diam elementum, tincidunt nibh quis, pulvinar orci. Nunc lacinia consequat nulla, ut tincidunt nunc dignissim non. Phasellus dictum gravida mi, vitae mollis purus faucibus id. Cras porttitor erat in cursus accumsan. Duis ornare quam maximus tellus eleifend, vel tempus nisi varius.<br><br>
                        Proin luctus accumsan porta. Suspendisse quis sem condimentum nulla bibendum tincidunt pharetra in mi. Pellentesque vel cursus felis. Quisque sed sem facilisis, ultricies ex at, vehicula felis. Duis hendrerit, metus a convallis rhoncus, erat urna maximus ligula, eu viverra nisl eros quis magna. Nunc lobortis vehicula sapien, a tincidunt elit maximus vitae. Sed mattis ex enim, sit amet convallis elit aliquam nec. Donec porta elit ac tortor ultrices eleifend. Phasellus aliquet velit et nisl blandit, ac faucibus magna ornare. Aenean non nisi interdum, condimentum velit ut, euismod ex. Curabitur maximus odio nec lorem pulvinar semper. Vestibulum erat elit, rhoncus id vulputate lacinia, dictum non diam. Integer auctor, libero sed sollicitudin eleifend, massa nulla consequat enim, nec convallis orci nulla in est. Praesent interdum ex vel ante posuere feugiat. Duis eget sem dapibus, semper felis at, ultrices libero. Cras eget neque vel tellus laoreet euismod quis id lacus.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascripts')

    {{ HTML::script('frontend/assets/components/jquery.fullpage/jquery.fullpage.min.js') }}

    <script type="text/javascript">

        $(document).ready(function(){

            /*$(window).on('load resize', function ()*/
            $(window).on('load', function ()
            {
                var section = $('.section').offset().top + $('.section').outerHeight(true);
                var bottom = $('.container-form').offset().top + $('.container-form').outerHeight(true);
                /*var position = $('.container-form').height()/2;*/

                console.log('section: '+ section);
                console.log('bottom: '+bottom);
                console.log(bottom > section)
                if(bottom > section){
                    $('.container-form').css({'bottom':'40px', 'position': 'absolute'});
                }

            });

            /*$(window).trigger('resize');*/

            if($(window).width() >= 768)
            {
                $('#fullpage').fullpage({
                    scrollingSpeed: 1000,
                    verticalCentered: false,
                    css3: true,
                    sectionsColor: ['#ffffff', '#ffffff', '#7BAABE', 'whitesmoke'],
                    navigation: true,
                    navigationPosition: 'right',
                    navigationTooltips: ['fullPage.js', 'Powerful', 'Amazing', 'Simple']
                });
            }
        });


    </script>

@endsection