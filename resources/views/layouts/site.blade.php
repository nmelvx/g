<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Gardinero') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('frontend/assets/css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/components/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/components/jquery.fullpage/jquery.fullpage.min.css') }}" rel="stylesheet">

    @yield('css')

    <link href="{{ asset('frontend/assets/css/styles.css?v=1.1') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

{{ HTML::script('https://code.jquery.com/jquery-2.2.4.min.js') }}
{{ HTML::script('frontend/assets/components/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}

@yield('javascripts')

    <script type="text/javascript">
        $('#login-form').validate({
            ignore: "",
            rules: {
                password: "required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                password: {
                    required: "Parola este obligatorie."
                }
            },

            submitHandler : function(form) {
                form.submit();
            }
        });

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
    </script>

</body>
</html>