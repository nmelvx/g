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
    <link href="{{ asset('frontend/assets/css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/styles.css?v=3.0') }}" rel="stylesheet">

    @yield('css')

    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=no; target-densityDpi=device-dpi">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

@include('includes.header')

@if(Auth::user()->hasRole(['admin', 'leader']))
    @include('includes.account-header-jobs')
@else
    @include('includes.account-header-client')
@endif

@yield('content')

@include('includes.footer')

{{ HTML::script('https://code.jquery.com/jquery-2.2.4.min.js') }}
{{ HTML::script('frontend/assets/components/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/jquery.validate.min.js') }}
{{ HTML::script('frontend/assets/components/jquery.validate/localization/messages_ro.js') }}
{{ HTML::script('frontend/assets/components/sweetalert/sweetalert.min.js') }}
{{ HTML::script('frontend/assets/components/datatables/jquery.dataTables.min.js') }}

@yield('javascripts')

<script type="text/javascript">

        $(window).on('load resize', function () {
            var windowSize = $(window).width();

            $(window).unbind('scroll');
            if(windowSize > 991)
            {
                $(window).scroll(function(){
                    if($('.border-green-bottom').length > 0){
                        $('.border-green-bottom').css('opacity', 1 - $(window).scrollTop() / 200);
                    }

                    if(parseFloat($('.border-green-bottom').css('opacity')) <= 0) {
                        $('.border-green-bottom').hide();
                    } else {
                        $('.border-green-bottom').show();
                    }
                });
            }
        });

</script>

</body>
</html>